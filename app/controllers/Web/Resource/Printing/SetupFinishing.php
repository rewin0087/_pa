<?php
namespace App\Controllers\Web\Resource\Printing;

use App\Controllers\Web as Web;
// model
use App\Models\PrintProducts as PrintProductModel;
use App\Models\PaperFinishing as PaperFinishingModel;
use App\Models\FinishingProductions as FinishingProductionModel;
use App\Models\FinishingProductionsCategory as FinishingProductionsCategoryModel;

# Load Cart Item Helper
use App\Controllers\Web\Helpers\Printing\CartItemHelper as CartItemHelper;
# Load Cart Helper
use App\Controllers\Web\Helpers\Printing\CartHelper as CartHelper;

class SetupFinishing extends Web {

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
     * Display a listing of the resource.
     * GET /resource/print/setup-finishing
     *
     * @return Response
     */
    public function index()
    {
        return $this->_getPaperFinishingWithCategories();
    } 

    /**
     * Display a listing of the resource.
     * POST /resource/print/setup-finishing/
     *
     * @return Response
     */
    public function store()
    {

        if( isset($this->_inputs['add_cart']) && $this->_inputs['add_cart'] )
        {
            # get current cart item
            $cartItem = $this->_getCurrentCartItem();

            if( isset($cartItem['edit_order_detail']) && $cartItem['edit_order_detail'] == 1 )
            {
                # get position
                $position = $cartItem['position'];
                # unset all flags
                unset($cartItem['position']);
                unset($cartItem['edit_order_detail']);

                return $this->_updateCurrentCartItemToCart($cartItem, $position);
            }
            else
            {
                # push now to real cart
                return $this->_pushToCart($cartItem);
            }
                
        }

        return $this->_setResponse([
                    'message' => 'Invalid Request, Please Select an Item to proceed'
                ], 500);
    }

    /**
     * Display a listing of the resource.
     * PUT /resource/print/setup-finishing/{id}
     *
     * @return Response
     */
    public function update($id)
    {
        if ( $this->_isEmptyCart() && !$this->_isEmptyPricing() )
        {
            # get pricing for each finishing
            $this->_inputs['pricing'] = $this->_computeFinishingPrice();
            // finishing
            if( isset($this->_inputs['current_selection_finishing']) && 
               $this->_inputs['current_selection_finishing'] == 1 )
            {
                # check if finishing exist
                if( $this->_hasCartProperties('finishing') )
                {

                    $finishing = $this->_getCartProperties('finishing');
                    # if multi dimension array get the finishing and append the new finishing selected
                    if( isset($finishing[0]) )
                    {
                        # get new finishing
                        $finishing[] = $this->_inputs;
                        # remove duplicate
                        $finishing = array_map("unserialize", 
                            array_unique(
                                array_map("serialize", $finishing)
                            )
                        );
                        # put them again as multi dimension array
                        $this->_putCartProperties('finishing', $finishing);
                    }
                    # if single dimension array make it a multidimension and append second finishing
                    else
                    {
                        # get old finishing
                        $array[] = $finishing;
                        # append new finishing
                        $array[] = $this->_inputs;
                        # put them again as multi dimension array
                        $this->_putCartProperties('finishing', $array);
                    }

                }
                # create new record
                else
                {
                    $array[0] = [$this->_inputs];
                    $this->_putCartProperties('finishing', $array[0]);
                }
                
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
    * Compute Production Finishing Price
    *
    */
    private function _computeFinishingPrice()
    {
        $data = $this->_inputs;
        $pricing = [];

        if( !$this->_isEmptyPricing() )
        {
            $cart = $this->_getCurrentCartItem();
            # get pricing data
            $pricing = $cart['quantity_price'];
            # get quantity
            $quantity = $pricing['quantity'];
            # get paper size id
            $paper_size_id = $cart['paper_size']['id'];
            # get paper type
            $paper_type_id = $cart['paper_type']['id'];
            # production category
            $category = $data['category_name'];
            # production finishing
            $finishing = $data['info'];
            # get pricing
            $pricing = PaperFinishingModel::activeList()
                ->paperSizeId($paper_size_id)
                ->paperTypeId($paper_type_id)
                ->production($finishing)
                ->productionCategory($category)
                ->first();

            if( !isset($pricing->id) )
            {
                return [];
            }
            # convert to array
            $pricing = $pricing->toArray();
            # compute price
            $pricing['price'] = ($quantity * $pricing['price_per_copy']) + $pricing['minimum_price_needed'];
        }

        return $pricing;
    }

    /**
    * Get Paper Finishing with Category
     *
     * @return Response
     */
    private function _getPaperFinishingWithCategories()
    {
        $finishings = [];

        if( $this->_isEmptyCart() && !$this->_isEmptyOptions() )
        {   
            # paper type id
            $paper_type_id = $this->_getCartProperties('paper_type.id');
            # paper size id
            $paper_size_id = $this->_getCartProperties('paper_size.id');
            # get all finishings
            $paper_finishings = PaperFinishingModel::paperTypeId($paper_type_id)
                ->paperSizeId($paper_size_id)
                ->activeList()
                ->get();

            if( isset($paper_finishings[0]) )
            {
                # convert to array
                $paper_finishings_array = $paper_finishings->toArray();
                $categories = [];

                foreach($paper_finishings_array as $paper_finishing)
                {
                    # get category
                    $categories[] = FinishingProductionsCategoryModel::whereCodeName($paper_finishing['production_category'])
                    ->get()
                    ->first();
                }

                # remove duplicates
                $categories = array_unique($categories);
                # check if not empty
                if( !empty($categories) )
                {
                    foreach($categories as $i => $category)
                    { 
                        # convert to array
                        $category = $category->toArray();
                        # map paper finishing to get finishing productions
                         foreach($paper_finishings_array as $paper_finishing)
                        {
                              $production = FinishingProductionModel::categoryName($category['code_name'])
                                 ->info($paper_finishing['productions'])
                                 ->get()
                                 ->first();

                            $category['productions'][] = $production;
                        }

                        # remove null | empty array, reindex array, remove duplicate
                        #
                        $category['productions'] = array_unique(array_values(array_filter($category['productions'])));
                        # push to finishing array
                        $finishings[] = $category;
                    }
                }
            }           
        }

       return $finishings; 
    } 
}