<?php
namespace App\Controllers\Control\Features;

use App\Controllers\Control as Control;

class Config extends Control  {
    
    /**
    * features/config/translations  Page
    *
    */
    public function translations () 
    {
        // set template
        $this->_template = \View::make('control.features.config.translations');
        // render page 
        $this->_appendTitle(' | Config - Translations')
            ->_setClass('config-translations-page')
            ->_renderPage();
    }
    
    /**
    * features/config/delivery-cut-off-time  Page
    *
    */
    public function deliveryCutOffTime () 
    {
        // set template
        $this->_template = \View::make('control.features.config.delivery-cut-off-time');
        // render page
        $this->_appendTitle(' | Config - Delivery Cut Off Time')
            ->_setClass('config-delivery-cut-off-time-page')
            ->_renderPage();
    }
    
    /**
    * features/config/logs  Page
    *
    */
    public function logs () 
    {
        // set template
        $this->_template = \View::make('control.features.config.logs');
        // render page
        $this->_appendTitle(' | Config - Logs')
            ->_setClass('config-logs-page')
            ->_renderPage();
    }

    /**
    * features/config/calendar  Page
    *
    */
    public function calendar () 
    {
        // set template
        $this->_template = \View::make('control.features.config.calendar');
        // render page
        $this->_appendTitle(' | Config - Calendar')
            ->_setClass('config-calendar-page')
            ->_renderPage();
    }

    /**
    * features/config/configurations  Page
    *
    */
    public function configurations () 
    {
        // set template
        $this->_template = \View::make('control.features.config.configurations');
        // render page
        $this->_appendTitle(' | Config - Configurations')
            ->_setClass('config-configurations-page')
            ->_renderPage();
    }

    /**
    * features/config/cut-off-time-settings  Page
    *
    */
    public function cutOffTimeSettings () 
    {
        // set template
        $this->_template = \View::make('control.features.config.cut-off-time-settings');
        // render page
        $this->_appendTitle(' | Config - Cut Off Time Settings')
            ->_setClass('config-cut-off-time-settings-page')
            ->_renderPage();
    }
}