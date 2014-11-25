<?php
namespace App\Controllers\Web;

use App\Controllers\Web as Web;

class Me extends Web {

    /**
     * me/orders Page
     *
     * @return void
     * 
     */
    public function orders()
    {
        if ( ! \Sentry::check())
        {
            // User is not logged in, or is not activated
             return \Redirect::to('/');
        }
        else
        {
            // User is logged in
             // add session for orders
            \Session::put('me', 'orders');
            // set template
            $this->_template = \View::make('web.me.orders.index');
            // render page
            $this->_appendTitle(' | My Orders')
                ->_setClass('me-orders-page')
                ->_renderPage();
        }
    }
    
    
    /**
     * me/info Page
     *
     * @return void
     * 
     */
    public function info()
    {  
        if ( ! \Sentry::check())
        {
            // User is not logged in, or is not activated
             return \Redirect::to('/');
        }
        else
        {
            // add session for info
            \Session::put('me', 'info');
            // set template
            $this->_template = \View::make('web.me.info.index');
            // render page
            $this->_appendTitle(' | My Information')
                ->_setClass('me-info-page')
                ->_renderPage();
        }
    }

    /**
     * me/addresses Page
     *
     * @return void
     * 
     */
    public function address()
    {
        if ( ! \Sentry::check())
        {
            // User is not logged in, or is not activated
             return \Redirect::to('/');
        }
        else
        {
            // add session for orders
            \Session::put('me', 'address');
            // set template
            $this->_template = \View::make('web.me.address.index');
            // render page
            $this->_appendTitle(' | My Addresses')
                ->_setClass('me-address-page')
                ->_renderPage();
        }
    }

    /**
     * me/libraries Page
     *
     * @return void
     * 
     */
    public function libraries()
    {
        if ( ! \Sentry::check())
        {
            // User is not logged in, or is not activated
             return \Redirect::to('/');
        }
        else
        {
            // add session for orders
            \Session::put('me', 'libraries');
            // set template
            $this->_template = \View::make('web.me.libraries.index');
            // render page
            $this->_appendTitle(' | My Libraries')
                ->_setClass('me-libraries-page')
                ->_renderPage();
        }
    }

}