<?php
namespace App\Controllers\Web;

use App\Controllers\Web as Web;

// model
use App\Models\FileUploads as FileUploadModel;

class Media extends Web {

    protected $layout = NULL;

    /**
     * Display a listing of the resource.
     * GET /control/home
     *
     * @return Response
     */
    public function image($id, $name) {
        $path = $this->_uploadPath . '/images';

        $file = FileUploadModel::find($id);
        if( isset($file->id) ) {
            $file_path = $path . '/' . $file->file_path;
            if(file_exists( $file_path ))
            {
                $image = file_get_contents( $file_path );
                $file_info = json_decode($file->file_infos, true);

                //display image
                return \Response::make($image, 202, array('Content-type'=> $file_info['type']));
            }
        }
        else
        {
            # return error if there are errors
            return $this->_setResponse([
                'message' => 'We cant Find your image.'
            ], 500);
        }
            
    }

}
