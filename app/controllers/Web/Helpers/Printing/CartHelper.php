<?php
namespace App\Controllers\Web\Helpers\Printing;

trait CartHelper {
    
    /**
    * Put Final Cart Details
    *
    * @param array
    */
    private function _putFinalCartData($cart)
    {
        $thirtyMinutes = 1800000;
        \Session::put('final_cart', $cart, $thirtyMinutes);

        return $this->_getFinalCartData();
    }

    /**
    * Get Final Cart
    *
    */
    private function _getFinalCartData()
    {
        return \Session::get('final_cart');
    }

    /**
    * Has Final Cart
    *
    */
    private function _hasFinalCartData()
    {
        return \Session::has('final_cart');
    }

    /**
    * Clear Final Cart
    *
    */
    private function _clearFinalCart()
    {
        return \Session::forget('final_cart');
    }

    /**
    * Clear Cart
    *
    */
    private function _clearCart()
    {
        return \Session::forget('cart');
    }

    /**
    * Push to Cart
    *
    * @param array
    */
    private function _pushToCart($cart_item)
    {
        $thirtyMinutes = 1800000;

        if ( ! $this->_hasCart() )
        {
            \Session::put('cart', [], $thirtyMinutes);
        }
        
        # get cart
        $cart = $this->_getCart();
        # push new item to cart
        $cart[] = ['item' => $cart_item];

        \Session::put('cart', $cart, $thirtyMinutes);

        return $this->_getCart();
    }

    /**
    * Remove to Cart
    *
    * @param array
    */
    private function _removeToCart($cart_item)
    {
        $thirtyMinutes = 1800000;

        if ( ! $this->_hasCart() )
        {
            \Session::put('cart', [], $thirtyMinutes);
        }
        
        $position = $cart_item['position'];   
        # get cart
        $cart = $this->_getCart();
        # remove from cart
        unset($cart[$position]);
        # reindex cart values
        $cart = array_values($cart);

        \Session::put('cart', $cart, $thirtyMinutes);

        return $this->_getCart();
    }

    /**
    * Update Given Name of Current Cart Item to Cart
    *
    * @param array
    */
    private function _updateGivenNameOfCurrentCartItemToCart($cart_item)
    {
        $thirtyMinutes = 1800000;
        
        if ( ! $this->_hasCart() )
        {
            \Session::put('cart', [], $thirtyMinutes);
        }

        # get position from position
        $position = $cart_item['item']['position'];   
        # remove item from input cart item
        unset($cart_item['item']);
        # get cart
        $cart = $this->_getCart();
        # set given name values
        $cart[$position]['item']['item_given_name'] = $cart_item;
        # reindex cart values
        $cart = array_values($cart);

        \Session::put('cart', $cart, $thirtyMinutes);

        return $cart[$position];
    }

    /**
    * Update Data Note of Current Cart Item to Cart
    *
    * @param array
    */
    private function _updateDataNoteOfCurrentCartItem($cart_item)
    {
        $thirtyMinutes = 1800000;
         
        if ( ! $this->_hasCart() )
        {
            \Session::put('cart', [], $thirtyMinutes);
        }

        # get position from position
        $position = $cart_item['position'];   
        # remove item from input cart item
        unset($cart_item['position']);
        # get cart
        $cart = $this->_getCart();
        # set given name values
        $cart[$position]['item']['data_note'] = $cart_item;
        # reindex cart values
        $cart = array_values($cart);

        \Session::put('cart', $cart, $thirtyMinutes);

        return $cart[$position];
    }

    /**
    * Update Current Cart Item to Cart
    *
    * @param array
    * @param int
    */
    private function _updateCurrentCartItemToCart($data, $position)
    {
        $thirtyMinutes = 1800000;
        
        if ( ! $this->_hasCart() )
        {
            \Session::put('cart', [], $thirtyMinutes);
        }

        # get cart
        $cart = $this->_getCart();
        # set print data values
        $cart[$position]['item'] = $data;
        # reindex cart values
        $cart = array_values($cart);

        \Session::put('cart', $cart, $thirtyMinutes);

        return $cart[$position];
    }

    /**
    * Update Print Data of Current Cart Item to Cart
    *
    * @param array
    * @param int
    */
    private function _updatePrintDataOfCurrentCartItemToCart($data, $position)
    {
        $thirtyMinutes = 1800000;
        
        if ( ! $this->_hasCart() )
        {
            \Session::put('cart', [], $thirtyMinutes);
        }

        # get cart
        $cart = $this->_getCart();
        # set print data values
        $cart[$position]['item']['print_data'] = $data;
        # reindex cart values
        $cart = array_values($cart);

        \Session::put('cart', $cart, $thirtyMinutes);

        return $cart[$position];
    }

    /**
    * Update Proof Data of Current Cart Item to Cart
    *
    * @param array
    * @param int
    */
    private function _updateProofDataOfCurrentCartItemToCart($data, $position)
    {
        $thirtyMinutes = 1800000;
        
        if ( ! $this->_hasCart() )
        {
            \Session::put('cart', [], $thirtyMinutes);
        }

        # get cart
        $cart = $this->_getCart();
        # set print data values
        $cart[$position]['item']['proof_data'] = $data;
        # reindex cart values
        $cart = array_values($cart);

        \Session::put('cart', $cart, $thirtyMinutes);

        return $cart[$position];
    }

    /**
    * has Cart
    *
    */
    private function _hasCart()
    {
        return \Session::has('cart');
    }

    /**
    * Get Cart
    *
    */
    private function _getCart()
    {
        if( !$this->_hasCart() )
        {
            return [];
        }

        return \Session::get('cart');
    }

}