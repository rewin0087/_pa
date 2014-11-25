<?php
namespace App\Models;

// Traits for softDelete
use Illuminate\Database\Eloquent\SoftDeletingTrait;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class PaperFinishingTypes extends  \Eloquent {
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
        'dex_code' => 'required|unique:paper_finishing_types,dex_code,NULL,deleted_at',
    ];

    /* Protected Properties
    -------------------------------*/
    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = [
        'dex_en_name', 'dex_ar_name', 'ar_name', 'en_name', 'dex_code'
    ];

    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    * Relation to Model PaperFinishingTypeOptions
    *
    * @return 'App\Models\PaperFinishingTypeOptions'
    */
    public function paperOptions()
    {
        return $this->hasMany('App\Models\PaperFinishingTypeOptions', 'paper_finishing_type_id');
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