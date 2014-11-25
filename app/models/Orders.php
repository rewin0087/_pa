<?php
namespace App\Models;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class Orders extends \Eloquent {
    /* Traits
    -------------------------------*/
    use ModelBaseHelper;
    
    /* Constants
    -------------------------------*/
    /**
    * CURRENCY
    */
    const CURRENCY = 'AED';
    
    /**
    * ORDER STATUS FLAG DEFINITIONS
    *
    */
    const WAITING_CODE = 110;
    const RECEPTED_CODE = 120;
    const PRINTING_CODE = 130;
    const DELIVERED_CODE = 140;
    const REFUNDED_CODE = 150;
    const CANCELED_CODE = 160;
    const SHIPPED_CODE = 170;
    const PAID_CODE = 180;

    /**
    * DISCOUNT TYPE
    *
    */
    const DISCOUNT_PROMOCODE = 'apply-promocode';
    const DISCOUNT_POINTS = 'use-my-points';

    /**
    * PAYMENT FLAG
    *
    */
    const BANK_TRANSFER = 'bank-transfer';
    const PAYPAL = 'paypal';
    const CREDIT_CARD = 'credit-card';

    /**
    * PAYMENT CODE DEFINITIONS
    *
    */
    const BANK_TRANSFER_CODE = '1';
    const PAYPAL_CODE = '2';
    const CREDIT_CARD_CODE = '3';

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
    * Get Payment Option code
    *
    */
    public function getPaymentOptionCode($payment_flag)
    {
        if( self::BANK_TRANSFER == $payment_flag )
        {
            return self::BANK_TRANSFER_CODE;
        }
        else if( self::PAYPAL == $payment_flag )
        {
            return self::PAYPAL_CODE;
        }
        else if( self::CREDIT_CARD == $payment_flag )
        {
            return self::CREDIT_CARD_CODE;
        }
    }

    /**
    * Inverse Relation to Model User
    *
    * @return 'App\Models\User'
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
    * Relation to Model OrderShipping
    *
    * @return 'App\Models\OrderShipping'
    */
    public function shipping()
    {
        return $this->hasOne('App\Models\OrderShipping', 'order_id');
    }

    /**
    * Relation to Model OrderItems
    *
    * @return 'App\Models\OrderItems'
    */
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItems', 'order_id');
    }

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}