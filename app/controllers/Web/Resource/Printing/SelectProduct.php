<?php
namespace App\Controllers\Web\Resource\Printing;

use App\Controllers\Web as Web;
// model
use App\Models\PrintProducts as PrintProductModel;

class SelectProducts extends Web {

    /**
     * Display a listing of the resource.
     * GET /resource/printing/select-products
     *
     * @return Response
     */
    public function index()
    {
        # return all
        return PrintProductModel::i()->getAllProductDetails();
        
    } 

     /**
     * Display a listing of the resource.
     * GET /resource/printing/select-products/{id}
     *
     * @return Response
     */
    public function show($id)
    {
        \Session::forget('cart_item');
        $product = PrintProductModel::find($id);
        if ( isset($product->id) )
        {
            \Session::put('cart_item', [
                'id' => $id,
                'product' => $product->toArray(),
                'day' => date('d'),
                'date' => date('Y-m-d')
            ]);

            return \Redirect::to('printing/setup-options');
        }

        return \Redirect::to('printing/select-products');
    } 
}