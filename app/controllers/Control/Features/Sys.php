<?php
namespace App\Controllers\Control\Features;

use App\Controllers\Control as Control;

class Sys extends Control  {
    
    /**
    * /features/sys/paper-colors  Page
    *
    */
    public function paperColors () 
    {
        // set template
        $this->_template = \View::make('control.features.sys.paper-colors');
        // render page 
        $this->_appendTitle(' | Paper Colors')
            ->_setClass('sys-paper-colors-page')
            ->_renderPage();
    }
    
    /**
    * /features/sys/paper-sizes  Page
    *
    */
    public function paperSizes () 
    {
        // set template
        $this->_template = \View::make('control.features.sys.paper-sizes');
        // render page
        $this->_appendTitle(' | Paper Sizes')
            ->_setClass('sys-paper-sizes-page')
            ->_renderPage();
    }
    
    /**
    * /features/sys/paper-finishing-types  Page
    *
    */
    public function paperFinishingTypes () 
    {
        // set template
        $this->_template = \View::make('control.features.sys.paper-finishing-types');
        // render page
        $this->_appendTitle(' | Paper Finishing Types')
            ->_setClass('sys-paper-finishing-types-page')
            ->_renderPage();
    }

    /**
    * /features/sys/finishing-productions  Page
    *
    */
    public function finishingProductions () 
    {
        // set template
        $this->_template = \View::make('control.features.sys.finishing-productions');
        // render page
        $this->_appendTitle(' | Finishing Productions')
            ->_setClass('sys-finishing-productions-page')
            ->_renderPage();
    }

    /**
    * /features/sys/finishing-productions-category  Page
    *
    */
    public function finishingProductionsCategory () 
    {
        // set template
        $this->_template = \View::make('control.features.sys.finishing-productions-category');
        // render page
        $this->_appendTitle(' | Finishing Productions Category')
            ->_setClass('sys-finishing-productions-category-page')
            ->_renderPage();
    }

    /**
    * /features/sys/bad-data-errors  Page
    *
    */
    public function badDataErrors () 
    {
        // set template
        $this->_template = \View::make('control.features.sys.bad-data-errors');
        // render page
        $this->_appendTitle(' | Bad Data Errors')
            ->_setClass('sys-bad-data-errors-page')
            ->_renderPage();
    }
}