<?php
namespace App\Controllers\Web\Resource\Printing;

use App\Controllers\Web as Web;

# Load Cart Item Helper
use App\Controllers\Web\Helpers\Printing\ShippingDetailsHelper as ShippingDetailsHelper;

class ShippingDetails extends Web {

    /**
    * Use Shipping Details Functions
    *
    */
    use ShippingDetailsHelper;

    /**
     * Display a listing of the resource.
     * GET /resource/printing/shipping-details
     *
     * @return Response
     */
    public function index()
    {
        return $this->_getShippingDetails();
    } 

     /**
     * Display a listing of the resource.
     * GET /resource/printing/shipping-details/{id}
     *
     * @return Response
     */
    public function show($id)
    {
        
    }
    /**
     * Display a listing of the resource.
     * POST /resource/printing/setup-options/
     *
     * @return Response
     */
    public function store()
    {
        // next trigger check if form all fields ar validated
        if( isset($this->_inputs['next']) && $this->_inputs['next'] == 1 )
        {
            unset($this->_inputs['next']);
            // $values = $this->_inputs;
            // return $this->_setResponse(['message' => $values], 500);
            return $this->_validateNext();
        }
    } 

    public function _validateNext()
    {
        if ( !isset($this->_inputs['shippingAddress'])) {
            return $this->_setResponse(['message' => 'Please Select a Shipping Address'], 500);
        }

        if ( !isset($this->_inputs['payment_options'])) {
            return $this->_setResponse(['message' => 'Please Select a Payment Options'], 500);
        }

        if ( !isset($this->_inputs['terms_and_conditions'])) {
            return $this->_setResponse(['message' => 'You did not agree to the terms and conditions'], 500);
        }

        $this->_putShippingProperties('payment_options', $this->_inputs['payment_options']);
        
        if( isset($this->_inputs['discounts']) )
        {
            $this->_putShippingProperties('discounts_and_totals.discounts', $this->_inputs['discounts']);
            $this->_putShippingProperties('discounts_and_totals.promocode', $this->_inputs['promocode']);
        }
        else
        {
            $this->_putShippingProperties('discounts_and_totals.discounts', '');
            $this->_putShippingProperties('discounts_and_totals.promocode', '');
        }

        if( isset($this->_inputs['final_note']) )
        {
            $this->_putShippingProperties('final_note', $this->_inputs['final_note']);
        }
        else
        {
            $this->_putShippingProperties('final_note', '');
        }

        return 0;
    }

    /**
    * Update the specified resource in storage.
    * PUT /resource/printing/setup-options/{id}
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {
        // for shipping address
        if( isset($this->_inputs['current_selection_shipping_address']) && 
            $this->_inputs['current_selection_shipping_address'] == 1 )
        {
            unset($this->_inputs['current_selection_shipping_address']);
            $this->_putShippingProperties('shipping_address', $this->_inputs);
            return $id;
        }
    }
}