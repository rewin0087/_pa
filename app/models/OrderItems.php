<?php
namespace App\Models;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class OrderItems extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/
    /**
    * ORDER ITEM STATUS FLAG DEFINITIONS
    *
    */
    const NEW_ORDER_CODE = 30;  # New
    const CHECKING_CODE = 40; # Checking
    const APPROVE_CODE = 50; # Waiting Approve
    const FINISHED_CODE = 60; # Waiting Customer Approval
    const BAD_DATA_CODE = 70; # Bad Data
    const RESUBMITTED_CODE = 80; # Resubmitted
    const COMMENT_CODE = 90; # Comment
    const COMPLETED_CODE = 100; # Completed
    const MISS_CODE = 110; # Miss
    const CANCELED_CODE = 120; # Canceled
    const ERROR_CODE = 130; # Error
    const PROCEED_AS_IS_CODE = 140; # Proceed As Is
    const COMPLETED_WITH_CHANGES_CODE = 150; # Completed with Changes

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
    * Relation to Model OrderFinishings
    *
    * @return 'App\Models\OrderFinishings'
    */
    public function orderFinishings()
    {
        return $this->hasMany('App\Models\OrderFinishings', 'order_item_id');
    }

    /**
    * Relation to Model OrderProductInfo
    *
    * @return 'App\Models\OrderProductInfo'
    */
    public function productInfo()
    {
        return $this->hasOne('App\Models\OrderProductInfo', 'order_item_id');
    }

    /**
    * Relation to Model OrderPricings
    *
    * @return 'App\Models\OrderPricings'
    */
    public function orderPricings()
    {
        return $this->hasMany('App\Models\OrderPricings', 'order_item_id');
    }

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
    * Inverse Relation to Model ParperTypes
    *
    * @return 'App\Models\ParperTypes'
    */
    public function paperType()
    {
        return $this->belongsTo('App\Models\ParperTypes', 'paper_type_id');
    }

    /**
    * Inverse Relation to Model PaperSizes
    *
    * @return 'App\Models\PaperSizes'
    */
    public function paperSize()
    {
        return $this->belongsTo('App\Models\PaperSizes', 'paper_size_id');
    }

    /**
    * Inverse Relation to Model PaperColors
    *
    * @return 'App\Models\PaperColors'
    */
    public function paperColor()
    {
        return $this->belongsTo('App\Models\PaperColors', 'paper_color_id');
    }

    /**
    * Inverse Relation to Model UserLibrary
    *
    * @return 'App\Models\UserLibrary'
    */
    public function library()
    {
        return $this->belongsTo('App\Models\UserLibrary', 'library_id');
    }

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}