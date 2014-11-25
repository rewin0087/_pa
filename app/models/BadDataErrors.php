<?php
namespace App\Models;

// Traits for softDelete
use Illuminate\Database\Eloquent\SoftDeletingTrait;
// Model Base Helper traits
use App\Models\Helper\ModelBase as ModelBaseHelper;

class BadDataErrors extends \Eloquent {
    /* Traits
    -------------------------------*/
    use SoftDeletingTrait;
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    public static $rules = [
        'dex_ar_name'  => "required",
        'dex_en_name'  => "required",
        'dex_en_description' => "required",
        'dex_ar_description' => "required",
        'category' => "required",
        'dex_code' => 'required|unique:bad_data_errors,dex_code,NULL,deleted_at',
    ];

    /* Protected Properties
    -------------------------------*/
    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    
    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    * Relation to Model BadDataErrorOptions
    *
    * @return 'App\Models\BadDataErrorOptions'
    */
    public function options()
    {
        return $this->hasMany('App\Models\BadDataErrorOptions', 'bad_data_error_id');
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