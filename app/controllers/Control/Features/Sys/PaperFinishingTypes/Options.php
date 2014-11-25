<?php
namespace App\Controllers\Control\Features\Sys\PaperFinishingTypes;

use App\Controllers\Control as Control;

class Options extends Control  {
    
    /**
    * /features/sys/paper-finishing-types/options/{id}/{dex_code}  Page
    *
    */
    public function show ($id, $dex_code) 
    {
        // set template
        $this->_template = \View::make('control.features.sys.paper-finishing-types.options')
            ->with('id', $id)
            ->with('dex_code', $dex_code);

        // render page
        $this->_appendTitle(' | Paper Finishing Types Options')
            ->_setClass('sys-paper-finishing-types-options-page')
            ->_renderPage();
    }
}