<?php

    /**
    * Resource for Me Addresses
    *  /resource/features/config/cut-off-time-settings
    *
    */
    Route::resource('/resource/me/shipping-addresses', 
        'App\Controllers\Web\Resource\Me\ShippingAddresses');

    /**
    * Resource for Me Addresses
    *  /resource/features/config/cut-off-time-settings
    *
    */
    Route::resource('/resource/me/sender-addresses', 
        'App\Controllers\Web\Resource\Me\SenderAddresses');

    /**
    * Resource for Me Addresses
    *  /resource/features/config/cut-off-time-settings
    *
    */
    Route::resource('/resource/me/addresses', 
        'App\Controllers\Web\Resource\Me\Addresses');

//