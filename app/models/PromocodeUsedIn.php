<?php
namespace App\Models;

// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class PromocodeUsedIn extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;

    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    public static $rules = array(
        'user_id'  => "required",
        'order_id'  => "required"
    );

    /* Protected Properties
    -------------------------------*/
    protected $table = 'promocode_used_in';
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    
    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    * Inverse Relation to Model Users
    *
    * @return 'App\Models\Users'
    */
    public function user()
    {
        return $this->belongsToMany('App\Models\Users', 'user_id');
    }

    /**
    * Inverse Relation to Model Orders
    *
    * @return 'App\Models\Orders'
    */
    public function order()
    {
        return $this->belongsToMany('App\Models\Orders', 'order_id');
    }

    /**
    * Inverse Relation to Model Promocodes
    *
    * @return 'App\Models\Promocodes'
    */
    public function promocode()
    {
        return $this->belongsToMany('App\Models\Promocodes', 'promocode_id');
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