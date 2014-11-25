<?php
namespace App\Controllers\Control\Resource\Features\Sys;

use App\Controllers\Control as Control;
// models
use App\Models\FinishingProductions as FinishingProductionsModel;
use App\Models\FileUploads as FileUploadModel;

class FinishingProductions extends Control {

	/**
	 * Display a listing of the resource.
	 * GET /resource/features/sys/paper-finishing-types
	 *
	 * @return Response
	 */
	public function index()
	{
        // return FinishingProductionsModel::whereCategoryName(\Input::get('category_name', false))->get();
		// return FinishingProductionsModel::all();
        // return FinishingProductionsModel::i()->getAllFinishingProductionsDetails();
        if( !empty($this->_inputs) && (isset($this->_inputs['category_name']) && $this->_inputs['category_name']) )
        {
            return FinishingProductionsModel::categoryName($this->_inputs['category_name'])
            ->get()
            ->load('image');
        }
        
         # return error if there are errors
        return $this->_setResponse([
            'message' => 'Invalid Category Name not found.'
        ], 500);
	}

    /**
     * Update the specified resource in storage.
     * PUT /resource/features/sys/papercolors/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        return $this->_update($id);
    }

	/**
	 * Update the specified resource in storage.
	 * PUT /resource/features/sys/paperfinishingtypes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	private function _update($id)
    {
        $inputs = $this->_inputs;
        $productImage = $this->_getFileInput('fp_image');
        
        # check if there's a data pass
        if( !empty($inputs) )
        {
             # validator
            $validator = $this->_validator($inputs, false);

            # return error if there are errors
            if($validator->fails())
            {
                return $this->_setResponse(['message' => $validator->messages()->first()], 500);
            }
            # do update
            else
            {
                # get data and set new data to print product
                $printing = FinishingProductionsModel::find($this->_inputs['id']);
                $printing->setValues($inputs);

                # if replace product image
                if( isset($productImage) && $productImage )
                {
                    # set rules for product image
                    $rules['fp_image'] = ['required', 'mimes:jpeg,bmp,png'];
                    # validate
                    if(\Validator::make($inputs, $rules)->fails())
                    {
                        return $this->_setResponse([
                                'message' => $validator->messages()->first()
                        ], 500);
                    }
                    else
                    {
                        # Get data of the file (product image)
                        #
                        $productImageData = FileUploadModel::find($inputs['thumbnail_id']);

                        # set data for product image
                        $printImage = new FileUploadModel;
                        $printImage->original_name = $productImage->getClientOriginalName();
                        $printImage->file_size = $productImage->getSize();
                        $printImage->type = FileUploadModel::FINISHING_PRODUCTIONS_IMAGE;
                        $printImage->file_infos = json_encode($this->_files['fp_image']);
                        # generate file name
                        $product_image_name = "image-" . 
                            FileUploadModel::i()->getHashName() . "." . 
                            $productImage->getClientOriginalExtension();

                        # upload product image
                        $upload_product_image = $productImage
                            ->move($this->_uploadPath . "/images/", 
                                $product_image_name);

                        # check if product image has been uploaded
                        if( $upload_product_image )
                        {
                            # Save new Product Image
                            $printImage->file_path = $product_image_name;
                            $printImage->save();
                            # set file_upload product image id
                            $printing->thumbnail_id = $printImage->id;
                            
                            # Remove
                            #
                            if( isset($productImageData->id) && $productImageData->deleteFile())
                            {
                                # delete record
                                $productImageData->delete();
                                
                            }
                            
                        } 
                        else
                        {
                            # return error if not found
                            return $this->_setResponse([
                                'message' => "Cant Upload Product Image."
                            ], 500);
                        }

                    }
                }

                # save product now
                $printing->save();

                return FinishingProductionsModel::find($printing->id)->load('image');
            }
        }

         # return error if there are errors
        return $this->_setResponse([
            'message' => 'Finishing Productions must not empty.'
        ], 500);
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
            'en_name' => ['required'],
            'ar_name' => ['required'],
        ];

        # validator
        return \Validator::make($data, $rules);
    }

}