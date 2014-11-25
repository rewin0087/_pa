<?php
namespace App\Controllers\Control\Products;

use App\Controllers\Control as Control;

class Printing extends Control {
    
    /**
     * product/printing/paper-type Page
     *
     * @return Response
     */
    public function paperType($id, $en_name) {
        // set template
        $this->_template = \View::make('control.products.printing.paper-type')
            ->with('print_product_id', $id)
            ->with('en_name', $en_name);
            
        // render page 
        $this->_appendTitle(' | Paper type')
            ->_setClass('product-printing-paper-type-page')
            ->_renderPage();
    }
}
