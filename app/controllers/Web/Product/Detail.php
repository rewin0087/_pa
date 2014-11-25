<?php
namespace App\Controllers\Web\Printing\Product;

use App\Controllers\Web as Web;

class Detail extends Web {

    /**
     * printing/select-product Page
     *
     * @return void
     * 
     */
    public function index($id, $en_name)
    {
        // set template
        $this->_template = \View::make('web.printing.product.detail')
            ->with('product_id', $id);

        // render page
        $this->_appendTitle(' | Product Detail')
            ->_setClass('product-detail-page')
            ->_renderPage();
    }
    
}