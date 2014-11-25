<?php
namespace App\Models;

// Model Base Helper traits
use App\Models\Helper\ModelBase as ModelBaseHelper;

class PaperSizes extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;

    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    public static $rules = [
        'dex_ar_name'  => "required",
        'dex_en_name'  => "required",
        'dex_code' => 'required|unique:paper_sizes,dex_code,NULL,deleted_at',
    ];

    /* Protected Properties
    -------------------------------*/
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    
    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/
    
    /**
    * Scope for filtering by dex_code
    *
    * @return self Query
    */
    public function scopeDexCode($query, $dex_code)
    {
        return $query->where('dex_code', '=', $dex_code);
    }

    /**
    * Relation to Model PaperFinihsing
    *
    * @return 'App\Models\PaperFinihsing'
    */
    public function paperFinishing()
    {
        return $this->hasMany('App\Models\PaperFinihsing', 'paper_type_id');
    }

    /**
    * Relation to Model PaperPricing
    *
    * @return 'App\Models\PaperPricing
    */
    public function paperPricing()
    {
        return $this->hasMany('App\Models\PaperPricing', 'paper_type_id');
    }
    
    /**
    * Relation to Model OrderItems
    *
    * @return 'App\Models\OrderItems'
    */
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItems', 'paper_size_id');
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