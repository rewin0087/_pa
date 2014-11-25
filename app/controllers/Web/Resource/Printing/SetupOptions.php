<?php
namespace App\Controllers\Web\Resource\Printing;

use App\Controllers\Web as Web;
// model
use App\Models\PaperPricing as PaperPricingModel;
use App\Models\PaperTypes as PaperTypeModel;
use App\Models\PaperSizes as PaperSizeModel;
# Load Cart Helper
use App\Controllers\Web\Helpers\Printing\CartItemHelper as CartItem;

class SetupOptions extends Web {

    /**
    * Use Cart Item Helper Functions
    *
    */
    use CartItem;

    /**
     * Display a listing of the resource.
     * GET /resource/printing/setup-options
     *
     * @return Response
     */
    public function index()
    {
        $product_id = \Session::get('cart_item.id');

        if( !isset($product_id))
        {
            return [];
        }

        $options = [];
        # set paper sizes
        $options['sizes'] = $this->_getPaperSizes();
        # set paper colors
        $options['colors'] = $this->_getPaperColors();
        # set paper types
        $options['paper_types'] = $this->_getPaperTypes();
        # set quantities and prices
        $options['quantities_prices'] = $this->_getQuantitiesAndPrices();

        return $options;
        
    } 

     /**
     * Display a listing of the resource.
     * GET /resource/printing/setup-options/cart
     *
     * @return Response
     */
    public function cart()
    {
        # return all
        return $this->_getCurrentCartItem();
    } 


     /**
     * Display a listing of the resource.
     * POST /resource/printing/setup-options/
     *
     * @return Response
     */
    public function store()
    {
        if ( $this->_isEmptyCart() )
        {
            // given name
            if( isset($this->_inputs['current_selection_given_name']) && 
               $this->_inputs['current_selection_given_name'] == 1 )
            {
                $this->_putCartProperties('item_given_name', $this->_inputs);
            }

            // data note
            if( isset($this->_inputs['update_data_note']) && 
               $this->_inputs['update_data_note'] == 1 )
            {
                $this->_putCartProperties('data_note', $this->_inputs);
            }
        } 
        else
        {
            return $this->_setResponse([
                'message' => 'Cart Empty', 
                'reload' => 1
            ], 500);
        }

        return $this->_getCurrentCartItem();
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
        if ( $this->_isEmptyCart() )
        {
            // paper size
            if( isset($this->_inputs['current_selection_paper_size']) && 
               $this->_inputs['current_selection_paper_size'] == 1 )
            {
                $this->_putCartProperties('paper_size', $this->_inputs);
            }

            // paper type
            if( isset($this->_inputs['current_selection_paper_type']) &&
                $this->_inputs['current_selection_paper_type'] == 1 )
            {
                $this->_putCartProperties('paper_type', $this->_inputs);
            }

            // paper color
            if( isset($this->_inputs['current_selection_paper_color']) &&
                $this->_inputs['current_selection_paper_color'] == 1 )
            {
                $this->_putCartProperties('paper_color', $this->_inputs);
            }

            // quantity and price
            if( isset($this->_inputs['current_selection_quantity_price']) &&
                $this->_inputs['current_selection_quantity_price'] == 1 )
            {
                $this->_putCartProperties('quantity_price', $this->_inputs);
            }

            $this->_checkQuantityAndPrice();
        } 
        else
        {
            return $this->_setResponse([
                'message' => 'Cart Empty', 
                'reload' => 1
            ], 500);
        }

        return $this->_getCurrentCartItem();
    }

    /**
    * Get Quantities and Prices
    *
    */
    private function _getQuantitiesAndPrices()
    {
        $options = [];
        
        if( !$this->_isEmptyOptions() )
        {
            # get Cart
            $cart = $this->_getCurrentCartItem();
            # Get all paper pricing according to params provided
            $options = PaperPricingModel::wherePaperSizeId($cart['paper_size']['id'])
                ->activeList()
                ->paperTypeId($cart['paper_type']['id'])
                ->paperColorId($cart['paper_color']['id'])
                ->orderBy('quantity')
                ->orderBy('tat')
                ->get();        
        }
        
        return $options;
    }

    /**
    * Get Paper Sizes of the current Product
    *
    */
    private function _getPaperSizes()
    {
        $options = [];
        # get product id
        $product_id = $this->_getCartProperties('id');
        # get papertypes
        $paperTypes = PaperTypeModel::printProductId($product_id)
            ->get();

        # get unique paper sizes
        $paperTypes->each(function($paperType) {
            $sizes = $paperType->paperPricing()
                ->activeList()
                ->groupBy('paper_size_id')
                ->get();

            $sizes->load('paperSize');
            $paperType['sizes'] = $sizes;
        });

        # flatten data
        if( !empty($paperTypes[0]) )
        {
            # convert object to array
            $array = $paperTypes->toArray();
            # map paper types now
            foreach($array as $type)
            {
                if( isset($type['sizes'][0]))
                {
                    # map paper sizes now
                    foreach($type['sizes'] as $size)
                    {
                        # push paper size
                        $options[] = $size['paper_size'];
                    }
                }
            }

           # get unique paper types
           $options = array_values(array_unique($options));
        }

        return $options;
    }

    /**
    * Get Paper Colors of the current Product
    *
    * @return array
    */
    private function _getPaperColors()
    {
        $options = [];
        # get product id
        $product_id = $this->_getCartProperties('id');
        # get papertypes
        $paperTypes = PaperTypeModel::printProductId($product_id)
            ->get();

        # get unique paper colors
        $paperTypes->each(function($paperType) {
            $colors = $paperType->paperPricing()
                ->activeList()
                ->groupBy('paper_color_id')
                ->get();

            $colors->load('paperColor');
            $paperType['colors'] = $colors;
        });

        # flatten data
        if( !empty($paperTypes[0]) )
        {
            # convert object to array
            $array = $paperTypes->toArray();
            # map paper types now
            foreach($array as $type)
            {
                if( isset($type['colors'][0]))
                {
                    # map paper sizes now
                    foreach($type['colors'] as $color)
                    {
                        # push paper size
                        $options[] = $color['paper_color'];
                    }
                }
            }

           # get unique paper types
           $options = array_values(array_unique($options));
        }

        return $options;
    }

    /**
    * Get Paper Type of th current paper size
    *
    * @return array
    */
    private function _getPaperTypes()
    {
        # get product id
        $product_id = $this->_getCartProperties('id');
        # get papertypes
        $paperTypes = PaperTypeModel::printProductId($product_id)
            ->get();

        return $paperTypes;
    }

    /**
    * Check Quantity and Price if still exist from the Pricing table
    *
    */
    private function _checkQuantityAndPrice()
    {
        if( $this->_hasCartProperties('quantity_price') )
        {
            if( !$this->_isEmptyOptions() )
            {
                 # get Cart
                $cart = $this->_getCurrentCartItem();
                # Get paper pricing according to params provided
                $pricing = PaperPricingModel::wherePaperSizeId($cart['paper_size']['id'])
                    ->activeList()
                    ->paperTypeId($cart['paper_type']['id'])
                    ->paperColorId($cart['paper_color']['id'])
                    ->tat($cart['quantity_price']['tat'])
                    ->quantity($cart['quantity_price']['quantity'])
                    ->first();

                if( isset($pricing->id) )
                {
                    $pricing = $pricing->toArray();
                    $pricing['current_selection_quantity_price'] = 1;
                    $this->_putCartProperties('quantity_price', $pricing);
                }
                else
                {
                    $this->_forgetCartProperties('quantity_price');
                }      
            }
        }
    }
}