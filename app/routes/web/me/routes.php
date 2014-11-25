<?php
    
    /**
    *
    *  me/orders  Route
    *
    */
    Route::get('/me/orders', 
        ['as' => 'me.orders',
        'uses' => 'App\Controllers\Web\Me@orders']
    );

    /**
    *
    *  me/info  Route
    *
    */
    Route::get('/me/info', 
        ['as' => 'me.info',
        'uses' => 'App\Controllers\Web\Me@info']
    );

    /**
    *
    *  me/address Route
    *
    */
    Route::get('/me/address', 
        ['as' => 'me.address',
        'uses' => 'App\Controllers\Web\Me@address']
    );

    /**
    *
    *  me/libraries  Route
    *
    */
    Route::get('/me/libraries', 
        ['as' => 'me.libraries',
        'uses' => 'App\Controllers\Web\Me@libraries']
    );
//