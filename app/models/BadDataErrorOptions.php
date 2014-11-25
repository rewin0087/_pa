<?php
namespace App\Models;

// Traits for softDelete
use Illuminate\Database\Eloquent\SoftDeletingTrait;
// Model Base Helper traits
use App\Models\Helper\ModelBase as ModelBaseHelper;

class BadDataErrorOptions extends \Eloquent {
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
        'dex_code' => 'required',
    ];

    /* Protected Properties
    -------------------------------*/
    protected $dates = ['deleted_at'];

    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    * Scope for filtering by bad data error id
    *
    * @return self Query
    */
    public function scopeBadDataErrorId($query, $badDataErrorId)
    {
        return $query->where('bad_data_error_id', '=', $badDataErrorId);
    }

    /**
    * Scope for filtering by bad error option dex code
    *
    * @return self Query
    */
    public function scopeDexCode($query, $dex_code)
    {
        return $query->where('dex_code', '=', $dex_code);
    }

    /**
    * Inverse Relation to Model BadDataErrors
    *
    * @return 'App\Models\BadDataErrors'
    */
    public function badDataError()
    {
        return $this->belongsTo('App\Models\BadDataErrors', 'bad_data_error_id');
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