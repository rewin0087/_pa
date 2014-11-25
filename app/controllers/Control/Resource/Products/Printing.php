<?php
namespace App\Controllers\Control\Resource\Products;

use App\Controllers\Control as Control;
// model
use App\Models\PrintProducts as PrintProductModel;
use App\Models\FileUploads as FileUploadModel;

class Printing extends Control {

    /**
     * Display a listing of the resource.
     * GET /resource/features/sys/paper-colors
     *
     * @return Response
     */
    public function index()
    {
        # return all
        return PrintProductModel::i()->getAllProductDetails();
        
    } 

    /**
     * Store a newly created resource in storage.
     * POST /resource/features/sys/paper-colors
     *
     * @return Response
     */
    public function store()
    {
        return $this->_store();
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
     * Remove the specified resource from storage.
     * DELETE /resource/features/sys/papercolors/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = PrintProductModel::find($id);
        $product->delete();
        # delete product image
        $productImage = FileUploadModel::find($product->file_upload_id);
        $productImage->deleteFile();
        $productImage->delete();
        # delete product hover image
        $productHoverImage = FileUploadModel::find($product->file_upload_hover_id);
        $productHoverImage->deleteFile();
        $productHoverImage->delete();
        
        return $product;
    }

    /**
     * Validation
     *
     * @param array
     * @param boolean
     * @return object
     */ 
    private function _validator($data, $add = true) 
    { 
        # set rules
        $rules = [
            'sheet_divisions' => ['required'],
            'en_name' => ['required'],
            'ar_name' => ['required'],
            'en_submission_time' => ['required'],
            'ar_submission_time' => ['required'],
            'en_shipping_date' => ['required'],
            'ar_shipping_date' => ['required'],
            'en_description' => ['required'],
            'ar_description' => ['required'],
            'en_paper_types' => ['required'],
            'ar_paper_types' => ['required'],
            'en_paper_weights' => ['required'],
            'ar_paper_weights' => ['required'],
            'en_color_options' => ['required'],
            'ar_color_options' => ['required'],
            'seo_url' => ['required']
        ];

        if($add)
        {
            $rules['product_image'] = ['required', 'mimes:jpeg,bmp,png'];
            $rules['product_hover_image'] = ['required', 'mimes:jpeg,bmp,png'];
            $rules['seo_url'] = ['required', 'unique:print_products'];
        }

        # validator
        return \Validator::make($data, $rules);
    }

    /**
    * Store New Print Product
    *
    * @return 'App\Models\PrintProducts'
    */
    private function _store()
    {
        $inputs = $this->_inputs;
        $productImage = $this->_getFileInput('product_image');
        $productHoverImage = $this->_getFileInput('product_hover_image');

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
            # save
            else
            {
                # set data to print product
                $printing = new PrintProductModel;
                $printing->setValues($inputs);
                
                # set data for product image
                $printImage = new FileUploadModel;
                $printImage->original_name = $productImage->getClientOriginalName();
                $printImage->file_size = $productImage->getSize();
                $printImage->type = FileUploadModel::PRODUCT_IMAGE;
                $printImage->file_infos = json_encode($this->_files['product_image']);
                # generate file name
                $product_image_name = "image-" . 
                    FileUploadModel::i()->getHashName() . "." . 
                    $productImage->getClientOriginalExtension();

                # upload product image
                $upload_product_image = $productImage->move($this->_uploadPath . "/images/", $product_image_name);
                # check if product image has been uploaded
                if( $upload_product_image )
                {
                    $printImage->file_path = $product_image_name;
                    $printImage->save();
                    # set file_upload product image id
                    $printing->file_upload_id = $printImage->id;

                    # set data for product hover image
                    $printHoverImage = new FileUploadModel;
                    $printHoverImage->original_name = $productHoverImage->getClientOriginalName();
                    $printHoverImage->file_size = $productHoverImage->getSize();
                    $printHoverImage->type = FileUploadModel::PRODUCT_IMAGE;
                    $printHoverImage->file_infos = json_encode($this->_files['product_hover_image']);
                    # generate file name
                    $product_hover_name = "hover-" . 
                        FileUploadModel::i()->getHashName() . "." . 
                        $productImage->getClientOriginalExtension();

                    # upload hover image
                    $upload_product_hover_image = $productHoverImage
                        ->move($this->_uploadPath . "/images/", 
                            $product_hover_name);
                    
                    # check if product hover image has been uploaded
                    if( $upload_product_hover_image )
                    {
                        $printHoverImage->file_path = $product_hover_name;
                        $printHoverImage->save();

                        # set file upload product hover id
                        $printing->file_upload_hover_id = $printHoverImage->id;
                        # save product now
                        $printing->save();

                        return PrintProductModel::i()->getProductDetails($printing->id);
                    }

                    # return error if there are errors
                    return $this->_setResponse([
                        'message' => 'Cant Upload Product Hover Image, Please check the file or try again.'
                    ], 500);
                }

                # return error if there are errors
                return $this->_setResponse([
                    'message' => 'Cant Upload Product Image, Please check the file or try again.'
                ], 500);
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Print Product must not empty.'
        ], 500);
    }

    /**
    * Update Print Product
    *
    * @param int
    * @return 'App\Models\PrintProducts'
    */
    private function _update($id)
    {
        $inputs = $this->_inputs;
        $productImage = $this->_getFileInput('e_product_image');
        $productHoverImage = $this->_getFileInput('e_product_hover_image');
        
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
                $printing = PrintProductModel::find($this->_inputs['id']);
                $printing->setValues($inputs);

                # if replace product image
                if( isset($productImage) && $productImage )
                {
                    # set rules for product image
                    $rules['e_product_image'] = ['required', 'mimes:jpeg,bmp,png'];
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
                        $productImageData = FileUploadModel::find($inputs['file_upload_id']);

                        # set data for product image
                        $printImage = new FileUploadModel;
                        $printImage->original_name = $productImage->getClientOriginalName();
                        $printImage->file_size = $productImage->getSize();
                        $printImage->type = FileUploadModel::PRODUCT_IMAGE;
                        $printImage->file_infos = json_encode($this->_files['e_product_image']);
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
                            $printing->file_upload_id = $printImage->id;
                            
                            # Remove
                            #
                            if( isset($productImageData->id) && $productImageData->deleteFile())
                            {
                                # delete record
                                $productImageData->delete();
                                
                            }
                            else
                            {
                                # return error if not found
                                return $this->_setResponse([
                                    'message' => "Product Image error while removing."
                                ], 500);
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

                # if replace product hover image
                if( isset($productHoverImage) && $productHoverImage)
                {
                    # set rules for product hover image
                    $rules['e_product_hover_image'] = ['required', 'mimes:jpeg,bmp,png'];
                    
                    # validate
                    if(\Validator::make($inputs, $rules)->fails())
                    {
                        return $this->_setResponse(['message' => $validator->messages()->first()], 500);
                    }
                    else
                    {
                        # Get data of the file (product hover image)
                        #
                        $productHoverImageData = FileUploadModel::find($inputs['file_upload_hover_id']);

                        # set data for product hover image
                        $printHoverImage = new FileUploadModel;
                        $printHoverImage->original_name = $productHoverImage->getClientOriginalName();
                        $printHoverImage->file_size = $productHoverImage->getSize();
                        $printHoverImage->type = FileUploadModel::PRODUCT_IMAGE;
                        $printHoverImage->file_infos = json_encode($this->_files['e_product_hover_image']);
                        # generate file name
                        $product_hover_image_name = "hover-" .
                            FileUploadModel::i()->getHashName() . "." . 
                            $productHoverImage->getClientOriginalExtension();

                        # upload product hover image
                        $upload_product_hover_image = $productHoverImage
                            ->move($this->_uploadPath . "/images/", 
                                $product_hover_image_name);
                        # check if product hover image has been uploaded
                        if( $upload_product_hover_image )
                        {
                            $printHoverImage->file_path = $product_hover_image_name;
                            $printHoverImage->save();
                            # set file_upload product hover image id
                            $printing->file_upload_hover_id = $printHoverImage->id;

                            # Remove and Save new Product Hover Image
                            #
                            if( isset($productHoverImageData->id) && $productHoverImageData->deleteFile())
                            {
                                # delete record
                                $productHoverImageData->delete();
                                
                            }
                            else
                            {
                                # return error if not found
                                return $this->_setResponse([
                                    'message' => "Product Hover Image error while removing."
                                ], 500);
                            }
                        }
                        else
                        {
                            # return error if not found
                            return $this->_setResponse([
                                'message' => "Product Hover Image error while removing."
                            ], 500);
                        }

                    }
                }

                # save product now
                $printing->save();

                return PrintProductModel::i()->getProductDetails($printing->id);
            }
        }

         # return error if there are errors
        return $this->_setResponse([
            'message' => 'Paper Color Data must not empty.'
        ], 500);
    }
}