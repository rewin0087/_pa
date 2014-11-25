<?php
namespace App\Controllers\Control\Features;

use App\Controllers\Control as Control;

class Utility extends Control  {
    
    /**
    * features/utility/paper-management  Page
    *
    */
    public function printerManagement () 
    {
        // set template
        $this->_template = \View::make('control.features.utility.printer-management');
        // render page 
        $this->_appendTitle(' | Utility - Printer Management')
            ->_setClass('utility-printer-management-page')
            ->_renderPage();
    }
    
    /**
    * features/utility/coupons-and-discounts  Page
    *
    */
    public function couponsAndDiscounts () 
    {
        // set template
        $this->_template = \View::make('control.features.utility.coupons-and-discounts');
        // render page
        $this->_appendTitle(' | Utility - Coupons and Discounts')
            ->_setClass('utility-coupons-and-discounts-page')
            ->_renderPage();
    }
    
    /**
    * features/utility/points-and-rewards Page
    *
    */
    public function pointsAndRewards () 
    {
        // set template
        $this->_template = \View::make('control.features.utility.points-and-rewards');
        // render page
        $this->_appendTitle(' | Utility - Points and Rewards')
            ->_setClass('utility-points-and-rewards-page')
            ->_renderPage();
    }

    /**
    * features/utility/promocodes Page
    *
    */
    public function promocodes () 
    {
        // set template
        $this->_template = \View::make('control.features.utility.promocodes');
        // render page
        $this->_appendTitle(' | Utility - Promocodes')
            ->_setClass('utility-promocodes-page')
            ->_renderPage();
    }
}