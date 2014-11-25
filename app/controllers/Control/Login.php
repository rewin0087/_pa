<?php
namespace App\Controllers\Control;

use App\Controllers\Control as Control;

class Login extends Control {

    protected $_header = NULL;
    protected $_footer = NULL;
    
    /**
     * Display a listing of the resource.
     * GET /control/login
     *
     * @return Response
     */
    public function index() {
        // render page
       return \View::make('control.login.index')
            ->with('class', 'login-page')
            ->with('title', $this->_title . ' | Login');
       
    }
}
