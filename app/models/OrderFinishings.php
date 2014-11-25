<?php
namespace App\Models;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class OrderFinishings extends \Eloquent {
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
    protected $dates = ['deleted_at'];

    /* Private Properties
    -------------------------------*/
    
    /* Public Methods
    -------------------------------*/

    /**
    *
    *
    */

    /**
    * Inverse Relation to Model OrderItems
    *
    * @return 'App\Models\OrderItems'
    */
    public function orderItem()
    {
        return $this->belongsTo('App\Models\OrderItems', 'order_item_id');
    }

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}