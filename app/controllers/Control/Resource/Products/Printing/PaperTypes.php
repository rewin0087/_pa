<?php
namespace App\Controllers\Control\Resource\Products\Printing;

use App\Controllers\Control as Control;
// model
use App\Models\PaperTypes as PaperTypeModel;
use App\Models\FileUploads as FileUploadModel;

class PaperTypes extends Control {

    /**
     * Display a listing of the resource.
     * GET /resource/products/printing/paper-types/
     *
     * @return Response
     */
    public function index() {
        
        if( !empty($this->_inputs) && (isset($this->_inputs['print_product_id']) && $this->_inputs['print_product_id']) )
        {
            return PaperTypeModel::printProductId($this->_inputs['print_product_id'])
                ->get()
                ->load('finishingFile', 'pricingFile');
        }
        
         # return error if there are errors
        return $this->_setResponse([
            'message' => 'Invalid Access Print Product Id not found.'
        ], 500);
    }

    /**
     * Store a newly created resource in storage.
     * POST /resource/products/printing/paper-types/
     *
     * @return Response
     */
    public function store() {
        //
        return $this->_save();
    }

    /**
     * Update the specified resource in storage.
     * PUT /resource/products/printing/paper-types/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        return $this->_save(true);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /resource/products/printing/paper-types/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
        $type = PaperTypeModel::find($id);
        $type->delete();

        # delete finishing file
        if( isset($type->finishingFile->id) )
        {
            $finishingFile = FileUploadModel::find($type->finishing_file->id);
            $finishingFile->deleteFile('excel');
            $finishingFile->delete();
        }

        # delete pricing file
        if( isset($type->pricingFile->id) )
        {
            $pricingFile = FileUploadModel::find($type->pricing_file->id);
            $pricingFile->deleteFile('excel');
            $pricingFile->delete();
        }

        return $type;
    }

    /**
     * Validation
     *
     * @param array
     *
     * @return object
     */
    private function _validator($data) 
    {
        # set rules 
        $rules = [
            'print_product_id' => ['required'],
            'en_name' => ['required'],
            'ar_name' => ['required'],
            'en_description' => ['required'],
            'ar_description' => ['required'],
            'cutoff_time_id' => ['required'],
            'paper_printer_id' => ['required'],
            'printer_api' => ['required', 'url']
        ];

        # validator
        return \Validator::make($data, $rules);
    }

     /**
    * Store New Print Product
    *
    * @return 'App\Models\PaperTypes'
    */
     private function _save($update = false)
     {
        $inputs = $this->_inputs;
        $file_finishing_list = $this->_getFileInput('file_finishing_list');
        $file_price_list = $this->_getFileInput('file_price_list');

        # check if all inputs are filled
        if( !empty($inputs) )
        {
            # validator
            $validator = $this->_validator($inputs);

            # validate
            if( $validator->fails() )
            {
                return $this->_setResponse([
                    'message' => $validator->messages()->first()
                ], 500);
            }
            # save | update
            else
            {
                $paperType = null;
                # update
                if( $update )
                {
                    $paperType = PaperTypeModel::find($inputs['id']);
                    $paperType->fill($inputs);
                    # reset error
                    $paperType->finishing_reload_errors = NULL;
                    # reset error
                    $paperType->price_reload_errors = NULL;
                }
                # save
                else
                {
                    $paperType = new PaperTypeModel;
                    $paperType->fill($inputs);
                }

                # upload file finishing file
                if( isset($file_finishing_list) && $file_finishing_list )
                {
                    # update additional proccess : remove file
                    if( $update )
                    {
                        $finishingFileData = FileUploadModel::find($inputs['file_finishing']);
                        if( isset($finishingFileData->id) )
                        {
                            $finishingFileData->deleteFile('excel');
                            $finishingFileData->delete();
                        }
                    }

                    # save
                    $finishingFile = new FileUploadModel;
                    $finishingFile->original_name = $file_finishing_list->getClientOriginalName();
                    $finishingFile->file_size = $file_finishing_list->getSize();
                    $finishingFile->type = FileUploadModel::EXCEL_FILE;
                    $finishingFile->file_infos = json_encode($this->_files['file_finishing_list']);
                    # generate file name
                    $file_finishing_name = 'excel-'.
                        FileUploadModel::i()->getHashName() . '.' .
                        $file_finishing_list->getClientOriginalExtension();
                    # upload file now
                    $upload_finishing_file = $file_finishing_list
                        ->move($this->_uploadPath . '/files/excel/',
                                $file_finishing_name);
                    # check if file has been uploaded
                    if( $upload_finishing_file )
                    {
                        $finishingFile->file_path = $file_finishing_name;
                        $finishingFile->save();
                        # set file_upload id for file_finishing
                        $paperType->file_finishing = $finishingFile->id;
                        # reset reloading
                        $paperType->finishing_list_reloaded = 0;
                        # reset error
                        $paperType->finishing_reload_errors = NULL;
                    }
                }

                # upload file pricing file
                if( isset($file_price_list) && $file_price_list )
                {
                    # update additional proccess : remove file
                    if( $update )
                    {
                        $pricingFileData = FileUploadModel::find($inputs['file_pricing']);
                        if( isset($pricingFileData->id) )
                        {
                            $pricingFileData->deleteFile('excel');
                            $pricingFileData->delete();
                        }
                    }

                    # save
                    $PricingFile = new FileUploadModel;
                    $PricingFile->original_name = $file_price_list->getClientOriginalName();
                    $PricingFile->file_size = $file_price_list->getSize();
                    $PricingFile->type = FileUploadModel::EXCEL_FILE;
                    $PricingFile->file_infos = json_encode($this->_files['file_price_list']);
                    # generate file name
                    $file_pricing_name = 'excel-'.
                        FileUploadModel::i()->getHashName() . '.' .
                        $file_price_list->getClientOriginalExtension();
                    # upload file now
                    $upload_pricing_file = $file_price_list
                        ->move($this->_uploadPath . '/files/excel/',
                                $file_pricing_name);
                    # check if file has been uploaded
                    if( $upload_pricing_file )
                    {
                        $PricingFile->file_path = $file_pricing_name;
                        $PricingFile->save();
                        # set file_upload id for file_finishing
                        $paperType->file_pricing = $PricingFile->id;
                        # reset reloading
                        $paperType->price_list_reloaded = 0;
                        # reset error
                        $paperType->price_reload_errors = NULL;
                    }
                }

                # save paper type
                $paperType->save();

                return $paperType::i()->getPaperTypeDetails($paperType->id);
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Paper Color Data must not empty.'
        ], 500);
     }
}
