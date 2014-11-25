<?php
namespace App\Controllers\Web;

use App\Controllers\Web as Web;
# Models
use App\Models\Orders as OrderModel;
# Delivery
use App\Models\DeliveryCutoff as DeliveryCutoffModel;
# Load Cart Helper
use App\Controllers\Web\Helpers\Printing\CartItemHelper as CartItem;
# Load Cart Helper
use App\Controllers\Web\Helpers\Printing\CartHelper as CartHelper;
# Load Shipping Details Helper
use App\Controllers\Web\Helpers\Printing\ShippingDetailsHelper as ShippingDetailsHelper;

class Printing extends Web {

    /**
    * Use Cart Item Helper Functions
    *
    */
    use CartHelper;
    
    /**
    * Use Cart Helper Functions
    *
    */
    use CartItem;

    /**
    * Use Shipping Details Helper Functions
    *
    */
    use ShippingDetailsHelper;
    
    /**
     * printing/select-product Page
     *
	 * @return void
	 * 
     */
    public function selectProduct()
    {
        $this->_clearCartItem();
        $this->_clearFinalCart();
        // set template
        $this->_template = \View::make('web.printing.select-product.index');
        // render page
        $this->_appendTitle(' | Select Product')
            ->_setClass('select-product-page')
            ->_renderPage();
    }
	
	
	/**
     * printing/setup-options Page
     *
	 * @return void
	 * 
     */
    public function setupOptions()
    {
        $this->_clearFinalCart();

        if( ! $this->_isEmptyCart() )
        {
            return \Redirect::to('printing/select-product');
        }

        // set template
        $this->_template = \View::make('web.printing.setup-options.index')
            ->with('cart', $this->_getCurrentCartItem());

        // render page
        $this->_appendTitle(' | Setup Options')
            ->_setClass('setup-options-page')
            ->_renderPage();
    }

    /**
     * printing/setup-finishing Page
     *
     * @return void
     * 
     */
    public function setupFinishing()
    {   
        $this->_clearFinalCart();

        if( $this->_isEmptyPricing() )
        {
            if( $this->_isEmptyOptions() ) {
                return \Redirect::to('printing/setup-options');
            }
             return \Redirect::to('printing/setup-options');
        }

        // set template
        $this->_template = \View::make('web.printing.setup-finishing.index')
            ->with('cart', $this->_getCurrentCartItem());
        // render page
        $this->_appendTitle(' | Setup Finishing')
            ->_setClass('setup-finishing-page')
            ->_renderPage();
    }

    /**
     * printing/upload-data Page
     *
     * @return void
     * 
     */
    public function uploadData()
    {   
        $this->_clearFinalCart();

        if( $this->_isEmptyPricing() )
        {
            if( $this->_isEmptyOptions() ) {
                return \Redirect::to('printing/setup-options');
            }
             return \Redirect::to('printing/setup-options');
        }

        // set template
        $this->_template = \View::make('web.printing.upload-data.index')
            ->with('cart', $this->_getCurrentCartItem());
        // render page
        $this->_appendTitle(' | Upload Data')
            ->_setClass('upload-data-page')
            ->_renderPage();
    }

    /**
     * printing/cart-summary Page
     *
     * @return void
     * 
     */
    public function cartSummary()
    {
        $this->_clearFinalCart();

        if( !$this->_isUserLoggedIn() )
        {
            return \Redirect::to('printing/select-product');
        }

        if( !$this->_hasCart() )
        {
            return \Redirect::to('printing/select-product');
        }

        # clear cart item holder
        $this->_clearCartItem();
       
        // set template
        $this->_template = \View::make('web.printing.cart-summary.index');
        // render page
        $this->_appendTitle(' | Cart Summary')
            ->_setClass('cart-summary-page')
            ->_renderPage();
    }

    /**
     * printing/shipping-details Page
     *
     * @return void
     * 
     */
    public function shippingDetails()
    {
        $this->_clearFinalCart();

        if( !$this->_hasCart() || !$this->_isUserLoggedIn() )
        {
            return \Redirect::to('printing/select-product');
        }
        
        // set template
        $DeliveryTime = DeliveryCutoffModel::all(array('value', 'id'))->toArray();
        $values = array_pluck($DeliveryTime, 'value');
        $ids = array_pluck($DeliveryTime, 'id');
        $DeliveryTimeCollection = array_combine($ids, $values);

        $this->_template = \View::make('web.printing.shipping-details.index')
        ->with(compact('DeliveryTimeCollection')); 
        // render page
        $this->_appendTitle(' | Shipping Details')
            ->_setClass('shipping-details-page')
            ->_renderPage();
    }

    /**
     * printing/final-summary Page
     *
     * @return void
     * 
     */
    public function finalSummary()
    {
        $this->_clearFinalCart();
        
        if( !$this->_isUserLoggedIn() )
        {
            return \Redirect::to('printing/select-product');
        }

        if( !$this->_hasCart() || !$this->_isEmptyShippingDetails() )
        {
            return \Redirect::to('printing/shipping-details');
        }
        
        // set template
        $this->_template = \View::make('web.printing.final-summary.index');
        // render page
        $this->_appendTitle(' | Final Summary')
            ->_setClass('final-summary-page')
            ->_renderPage();
    }

    /**
    * printing/:hash/done
    *
    * @return void
    */
    public function done($order_id, $hash_created_at)
    {
        if( !$this->_isUserLoggedIn() )
        {
            return \Redirect::to('printing/select-product');
        }

        # decrypt order id
        $decrypted_created_at = base64_decode($hash_created_at);
        # fet order
        $order = OrderModel::find($order_id)
            ->whereCreatedAt($decrypted_created_at);

         // set template
        $this->_template = \View::make('web.printing.done.index')
            ->with('order', $order);
        // render page
        $this->_appendTitle(' | Done')
            ->_setClass('done-page')
            ->_renderPage();

    }
}