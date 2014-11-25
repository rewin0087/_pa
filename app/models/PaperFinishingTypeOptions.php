<?php
namespace App\Models;

// Traits for softDelete
use Illuminate\Database\Eloquent\SoftDeletingTrait;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class PaperFinishingTypeOptions extends \Eloquent {
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
        'option_num' => 'required',
        'dex_code' => 'required|unique:paper_finishing_type_options,dex_code,NULL,deleted_at',
    ];

    /* Protected Properties
    -------------------------------*/
    protected $dates = ['deleted_at'];
    
    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/
    
    /**
    * Scope for filtering by paper finishing type id
    *
    * @return self Query
    */
    public function scopeFinishingTypeId($query, $finishingTypeId)
    {
        return $query->where('paper_finishing_type_id', '=', $finishingTypeId);
    }

    /**
    * Scope for filtering by paper finishing dex code
    *
    * @return self Query
    */
    public function scopeDexCode($query, $dex_code)
    {
        return $query->where('dex_code', '=', $dex_code);
    }

    /**
    * Inverse Relation to Model PaperFinishingTypes
    *
    * @return 'App\Models\PaperFinishingTypes'
    */
    public function paperFinishingType()
    {
        return $this->belongsTo('App\Models\PaperFinishingTypes', 'paper_finishing_type_id');
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