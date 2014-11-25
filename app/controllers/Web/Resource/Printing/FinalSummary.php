<?php
namespace App\Controllers\Web\Resource\Printing;

use App\Controllers\Web as Web;

# Load Cart Item Helper
use App\Controllers\Web\Helpers\Printing\CartItemHelper as CartItemHelper;
# Load Cart Helper
use App\Controllers\Web\Helpers\Printing\CartHelper as CartHelper;
# Load Shipping Details Helper
use App\Controllers\Web\Helpers\Printing\ShippingDetailsHelper as ShippingDetailsHelper;

class FinalSummary extends Web {

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
     * GET /resource/print/final-summary
     *
     * @return Response
     */
    public function index()
    {
        # return all cart item
        $data =  [];
        # get shipping details
        $data['shipping_details'] = $this->_getShippingDetails();
        # get cart items
        $data['cart'] = $this->_getCart();

        return $data;

    } 

    /**
     * Display a listing of the resource.
     * POST /resource/print/payment
     *
     * @return Response
     */
    public function store()
    {
        if( $this->_hasCart() && $this->_hasShippingDetails() )
        {
            $data = $this->_inputs;
            $cart = $this->_inputs['cart'];

            if( !empty($cart) )
            {
                $finishingTotal = 0;
                $printingTotal = 0;
                $totalCost = 0;
                $totalSheets = 0;
                foreach($cart as $item)
                {   
                    $finishingTotal += $item['finishing_price'];
                    $printingTotal += $item['printing_price'];
                    $totalCost += ($item['finishing_price'] + $item['printing_price']);
                    $totalSheets += $item['item']['quantity_price']['quantity'];
                }

                $data['order'] = [
                    'finishing_total' => $finishingTotal,
                    'printing_total' => $printingTotal,
                    'total_cost' => $totalCost,
                    'total_sheets' => $totalSheets
                ];
            }

            return $this->_putFinalCartData($data);
        }

        return $this->_setResponse(
            [
                'message' => 'Empty Cart.',
                'reload' => 1
            ]
        , 500);
    }
}