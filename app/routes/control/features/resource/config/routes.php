<?php

    /**
    * Resource for Features Config CutOffTimeSettings
    *  /resource/features/config/cut-off-time-settings
    *
    */
    Route::resource('/resource/features/config/cut-off-time-settings', 
        'App\Controllers\Control\Resource\Features\Config\CutOffTimeSettings');

    /**
    * Resource for Features Config DeliveryCutoff
    *  /resource/features/config/delivery-cut-off-time
    *
    */
    Route::resource('/resource/features/config/delivery-cut-off-time', 
        'App\Controllers\Control\Resource\Features\Config\DeliveryCutoff');

    /**
    * Resource for Features Config Configurations
    *  /resource/features/config/configurations
    *
    */
    Route::resource('/resource/features/config/configurations', 
        'App\Controllers\Control\Resource\Features\Config\Configurations');

//