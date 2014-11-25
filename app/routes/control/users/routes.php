<?php

    /**
    * Users/group Route
    *
    */
    Route::get('/users/group', 
        ['as' => 'users.group',
        'uses' => 'App\Controllers\Control\Users@group']
    );

    /**
    * Users/customers Route
    *
    */
    Route::get('/users/customers', 
        ['as' => 'users.customers',
        'uses' => 'App\Controllers\Control\Users@customers']
    );

    /**
    * Users/back-end Route
    *
    */
    Route::get('/users/back-end', 
        ['as' => 'users.back-end',
        'uses' => 'App\Controllers\Control\Users@backEnd']
    );

    /**
    * Users/access-controls Route
    *
    */
    Route::get('/users/access-controls', 
        ['as' => 'users.access-controls',
        'uses' => 'App\Controllers\Control\Users@accessControls']
    );


    /**
    * Require related Resource for users
    *
    */
    require app_path(). '/routes/control/users/resource/routes.php';
    
//
