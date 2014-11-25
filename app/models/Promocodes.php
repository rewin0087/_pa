<?php
namespace App\Models;

// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class Promocodes extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;

    /* Constants
    -------------------------------*/
    # TYPES
    const SUBMISSION_TIME_DISCOUNT_TYPE = 1;
    const PERIOD_DISCOUNT_TYPE = 2;
    const REGULAR_DISCOUNT_TYPE = 3;
    # DISCOUNT BY
    const DISCOUNT_BY_PERCENT_TOTAL_SALES = 1;
    const DISCOUNT_BY_AMOUNT = 2;
    # ENABLED | DISABLED
    const DISABLE = 0;
    const ENABLE = 1;

    /* Public Properties
    -------------------------------*/
    public static $rules = array(
        'code'  => "required",
        'type'  => "required",
        'discount' => "required",
    );

    /* Protected Properties
    -------------------------------*/
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['type', 'discount'];
    
    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/
    
    /**
    * generate code
    *
    */
    public function generateCode()
    {
        return str_shuffle(str_random(12).time());
    }

    /**
    * Relation to Model PromocodeUsedIn
    *
    * @return 'App\Models\PromocodeUsedIn'
    */
    public function promocodeUsedIn()
    {
        return $this->hasMany('App\Models\PromocodeUsedIn', 'promocode_id');
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