<?php
namespace App\Models;

// Model Base Helper traits
use App\Models\Helper\ModelBase as ModelBaseHelper;

class FileUploads extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/
    const PRODUCT_IMAGE = 1;
    const EXCEL_FILE = 2;
    const PRINT_DATA_FILE = 3;
    const PROOF_DATA_FILE = 4;
    const FINISHING_PRODUCTIONS_IMAGE = 5;


    /* Public Properties
    -------------------------------*/

    /* Protected Properties
    -------------------------------*/
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['code_name', 'en_name', 'api_settings'];

    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    * Relation to Model Finishing Productions - image
    *
    * @return 'App\Models\FinishingProductions'
    */
    public function finishingProductionsImage()
    {
        return $this->hasOne('App\Models\FinishingProductions', 'thumbnail_id');
    }

    /**
    * Relation to Model PrintProducts - Printing image
    *
    * @return 'App\Models\PrintProducts'
    */
    public function printingImage()
    {
        return $this->hasOne('App\Models\PrintProducts', 'file_upload_id');
    }

    /**
    * Relation to Model PrintProducts - Printing Hover image
    *
    * @return 'App\Models\PrintProducts'
    */
    public function printingHoverImage()
    {
        return $this->hasOne('App\Models\PrintProducts', 'file_upload_hover_id');
    }

    /**
    * Get Current Timestamp
    *
    */
    public function getHashName()
    {
        return str_random(12) ."-". time();
    }

    /**
    * Delete Physical file
    *
    * @return boolean
    */
    public function deleteFile($type = 'image')
    {
        $upload_path = app_path().'/storage/uploads';

        if($type == 'image')
        {
            $file = $upload_path . '/images/' . $this->file_path;
            file_exists($file) ? unlink($file) : NULL ;
            
            return !file_exists($file) ? true : false;
        }
        else if($type == 'excel')
        {
            $file = $upload_path . '/files/excel/' . $this->file_path;
            file_exists($file) ? unlink($file) : NULL ;

            return !file_exists($file) ? true : false;
        }
        
        # return error if not found
        return $this->_setResponse(['message' => "File can not be remove."], 500);
    }
    
    /**
    *
    *
    */

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}