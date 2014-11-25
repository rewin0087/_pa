<?php
namespace App\Controllers\Web\Helpers\Printing;

trait ShippingDetailsHelper {
 
    /**
    * Clear Cart
    *
    */
    private function _clearShippingDetails()
    {
        return \Session::forget('shipping_details');
    }

    /**
    * Clear Cart
    *
    */
    private function _putUser()
    {
        return \Session::put('shipping_details.user' ,  \Sentry::getUser());
    }

    /**
    * Get Shipping Details
    *
    */
    private function _getShippingDetails()
    {
        if( !$this->_isEmptyShippingDetails() )
        {
            return [];
        }
        
        return \Session::get('shipping_details');
    }

    /**
    * has Shipping Details
    *
    */
    private function _hasShippingDetails()
    {
        return \Session::has('shipping_details');
    }

    /**
    * Check if shipping Details is empty
    *
    */
    private function _isEmptyShippingDetails()
    {
        return \Session::has('shipping_details');
    }

    /**
    * Put Cart Properties
    *
    * @param string
    * @param array | string
    *
    */
    private function _putShippingProperties($index, $values)
    {
        return \Session::put('shipping_details.' . $index, $values);
    }

    /**
    * Push to Shipping Details
    *
    * @param array
    */
    private function _pushToShippingDetails($shipping_details_items)
    {
        $thirtyMinutes = 1800000;

        if ( ! $this->_hasCart() )
        {
            \Session::put('shipping_details', [], $thirtyMinutes);
        }
        
        # get cart
        $shipping_details = $this->_getShippingDetails();
        # push new item to cart
        $shipping_details[] = ['shipping_details' => $shipping_details_items];

        \Session::put('shipping_details', $shipping_details, $thirtyMinutes);

        return $this->_getShippingDetails();
    }
}