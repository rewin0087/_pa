<?php
namespace App\Controllers\Web\Resource\Printing;

use App\Controllers\Web as Web;
// model
use App\Models\PrintProducts as PrintProductModel;
use App\Models\PaperFinishing as PaperFinishingModel;
use App\Models\FinishingProductions as FinishingProductionModel;
use App\Models\FinishingProductionsCategory as FinishingProductionsCategoryModel;
use App\Models\FileUploads as FileUploadModel;

# Load Cart Item Helper
use App\Controllers\Web\Helpers\Printing\CartItemHelper as CartItemHelper;
# Load Cart Helper
use App\Controllers\Web\Helpers\Printing\CartHelper as CartHelper;

class UploadData extends Web {

    /**
    * Use Cart Item Helper Functions
    *
    */
    use CartHelper;

    /**
    * Use Cart Item Helper Functions
    *
    */
    use CartItemHelper;

    /**
     * Display a listing of the resource.
     * GET /resource/print/cart-summary
     *
     * @return Response
     */
    public function index()
    {
        // $this->_clearCart();
        # return all cart item
        return $this->_getCart();
    } 

    /**
     * Display a listing of the resource.
     * POST /resource/print/cart-summary
     *
     * @return Response
     */
    public function store()
    {
        if( $this->_isEmptyCart() && !$this->_isEmptyPricing() )
        {
            #
            # Go To Shipping Details
            #
            if( isset($this->_inputs['check_user_logged_in']) )
            {
                return $this->_isLoggedIn();
            }

            #
            # UPLOAD PRINT DATA
            #
            if( isset($this->_inputs['upload_print_data_file']) )
            {
                # check if user is logged in
                if( ! $this->_isUserLoggedIn() )
                {
                    return $this->_isLoggedIn();
                }

                return $this->_uploadPrintData($this->_inputs);
            }

            #
            # UPLOAD PROOF DATA
            #
            if( isset($this->_inputs['upload_proof_data_file']) )
            {
                # check if user is logged in
                if( ! $this->_isUserLoggedIn() )
                {
                    return $this->_isLoggedIn();
                }

                return $this->_uploadProofData($this->_inputs);
            }

        }

        return $this->_setResponse(
            [
                'message' => 'Empty Cart.',
                'reload' => 1
            ]
        , 500);
    }

    /**
    * Check if User is Logged in
    *
    */
    private function _isLoggedIn()
    {
        if( ! $this->_isUserLoggedIn() )
        {
            return $this->_setResponse(
                [
                    'message' => 'Please Login to continue.',
                    'show_login' => 1
                ]
            , 500); 
        }

        return [];
    }

    /**
    * Upload Print Data
    * @param array
    *
    */
    private function _uploadPrintData($item)
    {
        $printDataFile = $this->_getFileInput('print_data_file');
        # set Data
        $printData = new FileUploadModel;
        $printData->original_name = $printDataFile->getClientOriginalName();
        $printData->file_size = $printDataFile->getSize();
        $printData->type = FileUploadModel::PRINT_DATA_FILE;
        $printData->file_infos = json_encode($this->_files['print_data_file']);
        # generate file name
        $print_data_name = "print-data-" . 
            FileUploadModel::i()->getHashName() . "." . 
            $printDataFile->getClientOriginalExtension();
        # upload file
        $upload_print_data = $printDataFile->move($this->_uploadPath . "/images/", $print_data_name);
        # check if print data has been uploaded
        if( $upload_print_data )
        {
            $printData->file_path = $print_data_name;
            $printData->is_temp = 1;
            $printData->save();

            $this->_putCartProperties('print_data', $printData);

            return $this->_getCurrentCartItem();
        }

        return $this->_setResponse(
            [
                'message' => 'Cant Upload Print Data File.',
                'reload' => 1
            ]
        , 500);
    }

    /**
    * Upload Print Data
    * @param array
    *
    */
    private function _uploadProofData($item)
    {
        $proofDataFile = $this->_getFileInput('proof_data_file');
        # set Data
        $proofData = new FileUploadModel;
        $proofData->original_name = $proofDataFile->getClientOriginalName();
        $proofData->file_size = $proofDataFile->getSize();
        $proofData->type = FileUploadModel::PROOF_DATA_FILE;
        $proofData->file_infos = json_encode($this->_files['proof_data_file']);
        # generate file name
        $proof_data_name = "proof-data-" . 
            FileUploadModel::i()->getHashName() . "." . 
            $proofDataFile->getClientOriginalExtension();

        # upload file
        $upload_proof_data = $proofDataFile->move($this->_uploadPath . "/images/", $proof_data_name);
        # check if proof data has been uploaded
        if( $upload_proof_data )
        {
            $proofData->file_path = $proof_data_name;
            $proofData->is_temp = 1;
            $proofData->save();

            $this->_putCartProperties('proof_data', $proofData);

            return $this->_getCurrentCartItem();
        }

        return $this->_setResponse(
            [
                'message' => 'Cant Upload Proof Data File.',
                'reload' => 1
            ]
        , 500);
    }

}