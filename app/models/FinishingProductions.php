<?php
namespace App\Models;

// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class FinishingProductions extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['info', 'category_name','en_name','ar_name','thumbnail_id','category_name'];

    /* Private Properties
    -------------------------------*/
    /**
    * Get All Print Product Details
    *
    * @return array
    */
    public function getAllFinishingProductionsDetails()
    {
       $fproductions = self::all();
       $fproductions->load('image');

       return $fproductions;
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

        return $this;
    }
    
    /* Public Methods
    -------------------------------*/

    /**
    * Scope for filtering by paper finishing info
    *
    * @return self Query
    */
    public function scopeInfo($query, $info)
    {
        return $query->where('info', '=', $info);
    }

    /**
    * Scope for filtering by paper finishing categoryName
    *
    * @return self Query
    */
    public function scopeCategoryName($query, $categoryName)
    {
        return $query->where('category_name', '=', $categoryName);
    }

    /**
    * Relation to Model FileUploads - Printing image
    *
    * @return 'App\Models\FileUploads'
    */
    public function image()
    {
        return $this->belongsTo('App\Models\FileUploads', 'thumbnail_id');
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