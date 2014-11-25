<?php
namespace App\Controllers\Web\Resource\Printing;

use App\Controllers\Web as Web;
# Models
use App\Models\Orders as OrderModel;
use App\Models\OrderItems as OrderItemModel;
use App\Models\OrderFinishings as OrderFinishingModel;
use App\Models\OrderPricings as OrderPricingModel;
use App\Models\OrderProductInfo as OrderProductInfoModel;
use App\Models\OrderShipping as OrderShippingModel;
use App\Models\UserLibrary as UserLibraryModel;
use App\Models\FileUploads as FileUploadModel;

# Load Cart Item Helper
use App\Controllers\Web\Helpers\Printing\CartItemHelper as CartItemHelper;
# Load Cart Helper
use App\Controllers\Web\Helpers\Printing\CartHelper as CartHelper;
# Load Shipping Details Helper
use App\Controllers\Web\Helpers\Printing\ShippingDetailsHelper as ShippingDetailsHelper;

class Payment extends Web {

    /**
    * Use Cart Item Helper Functions
    *
    */
    use CartHelper;

    /**
    * Use Cart Item Helper Functions
    *
    */
    use CartItemHelper;

    /**
    * Use Shipping Details Helper Functions
    *
    */
    use ShippingDetailsHelper;

    /**
     * Display a listing of the resource.
     * GET /resource/print/payment
     *
     * @return Response
     */
    public function index()
    {
        if ( $this->_isUserLoggedIn() && $this->_hasFinalCartData() && $this->_hasShippingDetails() )
        {
            # separate them now
            $data = $this->_getCartAndShippingDetails();
            # process the order
            $order = $this->_processOrder($data);
            # clear final cart item data
            $this->_clearFinalCart();
            # clear cart data
            $this->_clearCart();

            #
            # BANK TRANSFER
            #
            if( $data['shipping_details']['payment_options'] == OrderModel::BANK_TRANSFER )
            {
                return \Redirect::to('printing/' . $order->id . '/done/' . base64_encode($order->created_at));
            }

            #
            # CREDIT CARD
            #

            #
            # PAYPAL
            #
        }

        return \Redirect::to('printing/cart-summary');
    } 

    /**
     * Display a listing of the resource.
     * POST /resource/print/payment
     *
     * @return Response
     */
    public function store()
    {
        if( $this->_hasCart() )
        {
            
        }

        return $this->_setResponse(
            [
                'message' => 'Empty Cart.',
                'reload' => 1
            ]
        , 500);
    }

    /**
    * Return All Cart and Shipping Info
    *
    */
    private function _getCartAndShippingDetails()
    {
        return $this->_getFinalCartData();
    }

    /**
    * Process Order
    * @param array 
    * @return void
    */
    private function _processOrder($data)
    {
        
        # check if shipping detail is set
        if( !isset($data['shipping_details']) || empty($data['shipping_details']) )
        {
            return \Redirect::to('printing/shipping-details');
        }

        # get shipping details
        $shipping = $data['shipping_details'];
        # check if cart is not empty
        if( !isset($data['cart']) || empty($data['cart']) )
        {
            return \Redirect::to('printing/select-product');
        }

        # get cart
        $cart = $data['cart'];
        # get order
        $order_data = $data['order'];
        # new order
        $newOrder = new OrderModel;
        $newOrder->currency = OrderModel::CURRENCY;
        $newOrder->discount_type = $shipping['discounts_and_totals']['discounts'];
        $newOrder->status = OrderModel::WAITING_CODE;
        $newOrder->payment_method = $newOrder->getPaymentOptionCode($shipping['payment_options']);
        $newOrder->final_message = $shipping['final_note'];
        $newOrder->total_sheets = $order_data['total_sheets'];
        $newOrder->printing_cost = $order_data['printing_total'];
        $newOrder->finishing_cost = $order_data['finishing_total'];
        $newOrder->shipping_cost = 0.00;
        $newOrder->total_cost = $order_data['total_cost'];
        $newOrder->grand_total_cost = $order_data['total_cost'];
        $newOrder->vat = 0.00;
        $newOrder->user_id = $this->_me['id'];

        # DISCOUNT
        if( isset($shipping['discounts_and_totals'],
            $shipping['discounts_and_totals']['discounts']) 
            && !empty($shipping['discounts_and_totals']['discounts']) )
        {
            # PROMOCODE CHECK
            if( $shipping['discounts_and_totals']['discounts'] == OrderModel::DISCOUNT_PROMOCODE )
            {
                $newOrder->promo_code = $shipping['discounts_and_totals']['promocode'];
            }
            # POINTS CHECK
            else if(  $shipping['discounts_and_totals']['discounts'] == OrderModel::DISCOUNT_POINTS )
            {
                $newOrder->use_points = $shipping['discounts_and_totals']['use_points'] = $this->_getUserInfo()->remaining_points;
            }
        }

        # save order
        $newOrder->save();

        # proccess Shipping
        $this->_processShipping($shipping, $newOrder);

        # process Cart Items
        $this->_processCartItems($cart, $newOrder);

        return $newOrder;
    }

    /**
    * Process Shipping
    *
    * @param array
    * @param 'App\Models\Orders'
    * @return void
    */
    private function _processShipping($shipping, $newOrder)
    {
        # new shipping
        $newShipping = new OrderShippingModel;
        # set shipping address
        if( isset($shipping['shipping_address'] ) && !empty($shipping['shipping_address'] ))
        {
            # fill
            $newShipping->fill($shipping['shipping_address']);
            $newOrder->shipping()->save($newShipping);
        }
    }

    /**
    * Get User Basic Info
    *
    * @return 'App\Models\UserInfo'
    */
    private function _getUserInfo()
    {
        return \User::find($this->_me['id'])->userInfo()->first();
    }

    /**
    * Process Cart Items
    * @param array
    * @param 'App\Models\Orders'
    * @return void
    */
    private function _processCartItems($cart, $newOrder)
    {
        # cart items
        if( !empty($cart) )
        {
            foreach($cart as $product)
            {
                # order Item
                $newOrderItem = new OrderItemModel;
                $newOrderItem->sheets = $product['item']['product']['sheet_division'];
                $newOrderItem->label = isset($product['item']['item_given_name']) ? $product['item']['item_given_name']['cart_item_name'] : '';
                $newOrderItem->tat = $product['total_working_days'];
                $newOrderItem->note = isset($product['item']['data_note']) ? $product['item']['data_note']['cart_add_note'] : '';
                $newOrderItem->status = OrderItemModel::NEW_ORDER_CODE;
                $newOrderItem->delivery_status = OrderItemModel::NEW_ORDER_CODE;
                $newOrderItem->finishing_cost = $product['finishing_price'];
                $newOrderItem->printing_cost = $product['printing_price'];
                $newOrderItem->shipping_cost = 0.00;
                $newOrderItem->total_cost = $product['total_price'];
                $newOrderItem->print_data = $product['item']['print_data']['id'];
                $newOrderItem->proof_data = $product['item']['proof_data']['id'];
                $newOrderItem->paper_type_id = $product['item']['quantity_price']['paper_type_id'];
                $newOrderItem->paper_color_id = $product['item']['quantity_price']['paper_color_id'];
                $newOrderItem->paper_size_id = $product['item']['quantity_price']['paper_size_id'];
                $newOrderItem->order_id = $newOrder->id;

                # Update Print Data temp status
                $printData = FileUploadModel::find($newOrderItem->print_data);
                $printData->is_temp = 0;
                $printData->save();
                # Update Proof Data temp status
                $proofData = FileUploadModel::find($newOrderItem->proof_data);
                $proofData->is_temp = 0;
                $proofData->save();

                # library 
                $library = $this->_processCartItemLibrary($newOrderItem);
                # set library id
                $newOrderItem->library_id = $library->id;
                # save order item
                $newOrderItem->save();
                
                # Pricing
                $this->_processCartItemPricing($newOrderItem, $product);
                # Product Info
                $this->_processCartItemProductInfo($newOrderItem, $product);
                # Finishing
                $this->_processCartItemFinishing($newOrderItem, $product);
            }
        }
    }

    /**
    * Process Cart Item Finishing
    * @param 'App\Models\OrderItems'
    * @param array
    * @return void
    */
    private function _processCartItemFinishing($newOrderItem, $product)
    {
        if( isset($product['finishing']) && !empty($product['finishing']) )
        {
            $finishings = [];
            foreach( $product['finishing'] as $finishing )
            {
                $newOrderFinishing = new OrderFinishingModel;
                $newOrderFinishing->origin_id = $finishing['id'];
                $finishings[] = $newOrderFinishing;
            }
            $newOrderItem->orderFinishings()->saveMany($finishings);
        }
    }

    /**
    * Process Cart Item Product Info
    * @param 'App\Models\OrderItems'
    * @param array
    * @return void
    */
    private function _processCartItemProductInfo($newOrderItem, $product)
    {
        $newProductInfo = new OrderProductInfoModel;
        $newProductInfo->origin_id = $product['item']['product']['id'];
        $newOrderItem->productInfo()->save($newProductInfo);
    }

    /**
    * Process Cart Item Pricing
    * @param 'App\Models\OrderItems'
    * @param array
    * @return void
    */
    private function _processCartItemPricing($newOrderItem, $product)
    {
        $newOrderPricing = new OrderPricingModel;
        $newOrderPricing->origin_id = $product['item']['quantity_price']['id'];
        $newOrderItem->orderPricings()->save($newOrderPricing);
    }

    /**
    * Process Cart Item Library
    * @param 'App\Models\OrderItems'
    * @return 'App\Models\UserLibrary'
    */
    private function _processCartItemLibrary($newOrderItem)
    {
        $newLibrary = new UserLibraryModel;
        $newLibrary->print_data_id = $newOrderItem->print_data;
        $newLibrary->proof_data_id = $newOrderItem->proof_data;
        $newLibrary->name = isset($newOrderItem->name) ? $newOrderItem->name : '';
        $newLibrary->user_id = $this->_me['id'];
        $newLibrary->save();

        return $newLibrary;
    }
}