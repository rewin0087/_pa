<?php
namespace App\Models;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class OrderShipping extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/

    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    protected $table = 'order_shipping';
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id', 'name', 'address', 'building_name', 'type', 
        'telephone_number', 'mobile_number', 'is_corporate', 'is_primary',
        'company_name', 'receiving_first_name', 'receiving_last_name',
        'country', 'city', 'area', 'street', 'delivery_cutoff_time_id'
    ];

    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    *
    *
    */

    /**
    * Inverse Relation to Model Orders
    *
    * @return 'App\Models\Orders'
    */
    public function order()
    {
        return $this->belongsTo('App\Models\Orders', 'order_id');
    }

    /**
    * Inverse Relation to Model DeliveryCutOff
    *
    * @return 'App\Models\DeliveryCutOff'
    */
    public function deliveryCutOff()
    {
        return $this->belongsTo('App\Models\DeliveryCutOff', 'delivery_cutoff_id');
    }

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}