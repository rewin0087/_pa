<?php
namespace App\Controllers\Control\Features\Sys\FinishingProductionsCategory;

use App\Controllers\Control as Control;

class Options extends Control  {
    
    /**
    * /features/sys/paper-finishing-types/options/{id}/{dex_code}  Page
    *
    */
    public function show ($id, $category_name) 
    {
        // set template
        $this->_template = \View::make('control.features.sys.finishing-productions-category.options')
            ->with('id', $id)
            ->with('category_name', $category_name);

        // render page
        $this->_appendTitle(' | Finishing Prodictions Category Options')
            ->_setClass('sys-finishing-productions-category-options-page')
            ->_renderPage();
    }
}