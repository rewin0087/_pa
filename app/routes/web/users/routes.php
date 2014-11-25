<?php
    
    /**
    *
    *  /login  Route
    *
    */
    Route::get('login', 
        ['as' => 'login',
        'uses' => 'App\Controllers\Web\Home@getLogin']
    );

    /**
    *
    *  /register  Route
    *
    */
    Route::get('register', 
        ['as' => 'register',
         'uses' => 'App\Controllers\Web\Home@getRegister']
    );

    /**
    *
    *  /login post  Route
    *
    */
    Route::post('login', 
        ['as' => 'login',
        'uses' => 'App\Controllers\Web\Resource\Users\Customers@postLogin']
    );

    /**
    *
    *  /register post Route
    *
    */
    Route::post('register', 
        ['as' => 'register',
        'uses' => 'App\Controllers\Web\Resource\Users\Customers@postRegister']
    );

    /**
    *
    *  /register post Route
    *
    */
    Route::get('logout', 
        ['as' => 'logout',
        'uses' => 'App\Controllers\Web\Resource\Users\Customers@logout']
    );
//