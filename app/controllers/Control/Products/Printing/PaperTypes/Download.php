<?php
namespace App\Controllers\Control\Products\Printing\PaperTypes;

use App\Controllers\Control as Control;
// model
use App\Models\FileUploads as FileUploadModel;

class Download extends Control {
    
    protected $layout = null;

    /**
     * product/printing/paper-type Page
     *
     * @return Response
     */
    public function excel($print_product_id, $file_id, $file_name) {
        $file = FileUploadModel::find($file_id);
        $excel_path = $this->_uploadPath . '/files/excel';

        if( isset($file->id) )
        {
            $file_path = $excel_path . '/' . $file->file_path;
            $file_info = json_decode($file->file_info);

            return \Response::Download($file_path, 
                $file->original_name, 
                ["Content-type: ".$file_info['type']]);
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'We cant Find your excel file.'
        ], 500);
    }
}
