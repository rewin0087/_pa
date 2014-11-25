<?php
namespace App\Controllers\Web\Helpers\Printing;

trait CartItemHelper {
 
    /**
    * Check if cart is empty
    *
    */
    private function _isEmptyCart()
    {
        return \Session::has('cart_item');
    }

    /**
    * Check if Cart Item is not empty
    * 
    * @return boolean
    */
    private function _isEmptyOptions()
    {
        if( \Session::has('cart_item') )
        {
            # get Cart
            $cart = \Session::get('cart_item');

            if( 
               isset($cart['product'], $cart['paper_color'], $cart['paper_type'], $cart['paper_size']) && 
               (
                !empty($cart['product']) && 
                !empty($cart['paper_color']) && 
                !empty($cart['paper_type']) && 
                !empty($cart['paper_size'])
                ) 
            )
            {
                return false;
            }
        }

        return true;
    }

    /**
    * Check if Cart Item is not empty
    * 
    * @return boolean
    */
    private function _isEmptyPricing()
    {
        if( \Session::has('cart_item') )
        {
            # get Cart
            $cart = \Session::get('cart_item');
            
            if( isset($cart['quantity_price']) && !empty($cart['quantity_price'] ) )
            {
                return false;
            }
        }

        return true;
    }

    /**
    * Get Cart Item
    *
    */
    private function _getCurrentCartItem()
    {
        if( !$this->_isEmptyCart() ) 
        {
            return [];
        }

         # return all
        return \Session::get('cart_item');
    }

    /**
    * Has Cart Item Properties
    *
    */
    private function _hasCartProperties($index)
    {
        return \Session::has('cart_item.' . $index);
    }

    /**
    * Put Cart Properties
    *
    * @param string
    * @param array | string
    *
    */
    private function _putCartProperties($index, $values)
    {
        return \Session::put('cart_item.' . $index, $values);
    }

    /**
    * Remove Cart Properties
    *
    * @param string
    *
    */
    private function _forgetCartProperties($index)
    {
        return \Session::forget('cart_item.' . $index);
    }

    /**
    * Get Cart Properties
    *
    * @param string
    */
    private function _getCartProperties($index)
    {
        return \Session::get('cart_item.' . $index);
    }

    /**
    * Remove Cart Item
    *
    */
    private function _clearCartItem()
    {
       return \Session::forget('cart_item');
    }

     /**
    * Put Cart Item
    *
    * @param array
    */
    private function _putCartItem($cart_item)
    {
       \Session::put('cart_item', $cart_item['item']);

       return $this->_getCurrentCartItem();
    }
}