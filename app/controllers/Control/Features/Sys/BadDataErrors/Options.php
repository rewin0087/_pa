<?php
namespace App\Controllers\Control\Features\Sys\BadDataErrors;

use App\Controllers\Control as Control;

class Options extends Control  {
    
    /**
    * /features/sys/bad-data-errors/options/{id}  Page
    *
    */
    public function show ($id, $dex_code) 
    {
        // set template
        $this->_template = \View::make('control.features.sys.bad-data-errors.options')
            ->with('bad_data_error_id', $id)
            ->with('dex_code', $dex_code);

        // render page
        $this->_appendTitle(' | Bad Data Error Options')
            ->_setClass('sys-bad-data-error-options-page')
            ->_renderPage();
    }
}