<?php
namespace App\Models;

// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class PrintProducts extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    public static $rules = [
        'sheet_divisions' => 'required',
        'en_name' => 'required|unique:print_products,en_name,NULL,deleted_at',
        'en_submission_time' => 'required',
        'en_shipping_date' => 'required',
        'en_paper_types' => 'required',
        'en_paper_weights' => 'required',
        'en_color_options' => 'required',
        'ar_name' => 'required|unique:print_products,ar_name,NULL,deleted_at',
        'ar_submission_time' => 'required',
        'ar_shipping_date' => 'required',
        'ar_paper_types' => 'required',
        'ar_paper_weights' => 'required',
        'ar_color_options' => 'required',
        'seo_url' => 'required|unique:print_products,seo_url,NULL,deleted_at',
    ];
    
    /* Protected Properties
    -------------------------------*/
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    
    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/
    /**
    * Get All Print Product Details
    *
    * @return array
    */
    public function getAllProductDetails()
    {
       $products = self::all();
       $products->load('image', 'hoverImage');

       return $products;
    }

    /**
    * Get Print Product Details
    *
    * @param int
    * @return array
    */
    public function getProductDetails($id)
    {
       $product = self::find($id);
       $product->load('image', 'hoverImage');

       return $product;
    }


    /**
    * Set Model Values
    *
    * @param model 'App\Models\PRintProducts'
    * @param array
    * @return 'App\Models\PRintProducts'
    */
    public function setValues($inputs)
    {
        $this->en_name = $inputs['en_name'];
        $this->ar_name = $inputs['ar_name'];
        $this->sheet_division = $inputs['sheet_divisions'];
        $this->en_submission_time = $inputs['en_submission_time'];
        $this->ar_submission_time = $inputs['ar_submission_time'];
        $this->en_shipping_date = $inputs['en_shipping_date'];
        $this->ar_shipping_date = $inputs['ar_shipping_date'];
        $this->en_description = $inputs['en_description'];
        $this->ar_description = $inputs['ar_description'];
        $this->en_paper_types = $inputs['en_paper_types'];
        $this->ar_paper_types = $inputs['ar_paper_types'];
        $this->en_paper_weights = $inputs['en_paper_weights'];
        $this->ar_paper_weights = $inputs['ar_paper_weights'];
        $this->en_color_options = $inputs['en_color_options'];
        $this->ar_color_options = $inputs['ar_color_options'];
        $this->seo_url = $inputs['seo_url'];

        return $this;
    }

    /**
    * Relation to Model FileUploads - Printing image
    *
    * @return 'App\Models\FileUploads'
    */
    public function image()
    {
        return $this->belongsTo('App\Models\FileUploads', 'file_upload_id');
    }

    /**
    * Relation to Model FileUploads - Printing Hover image
    *
    * @return 'App\Models\FileUploads'
    */
    public function hoverImage()
    {
        return $this->belongsTo('App\Models\FileUploads', 'file_upload_hover_id');
    }

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}