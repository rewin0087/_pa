<?php
    /**
    * Resource for Features Dex PaperFinishingTypes
    * POST /resource/features/dex/paper-finishing-types
    *
    */
    Route::post('/resource/features/dex/paper-finishing-types', 
        'App\Controllers\Control\Resource\Features\Dex\PaperFinishingTypes@store');

    /**
    * Resource for Features Dex PaperColors
    * POST /resource/features/dex/paper-colors
    *
    */
    Route::post('/resource/features/dex/paper-colors', 
        'App\Controllers\Control\Resource\Features\Dex\PaperColors@store');

    /**
    * Resource for Features Dex PaperSizes
    * POST /resource/features/dex/paper-sizes
    *
    */
    Route::post('/resource/features/dex/paper-sizes', 
        'App\Controllers\Control\Resource\Features\Dex\PaperSizes@store');

    /**
    * Resource for Features Dex BadDataErrors
    * POST /resource/features/dex/bad-data-errors
    *
    */
    Route::post('/resource/features/dex/bad-data-errors', 
        'App\Controllers\Control\Resource\Features\Dex\BadDataErrors@store');

//