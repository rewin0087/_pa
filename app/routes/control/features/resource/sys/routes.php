<?php
    /**
    * Resource for Features Sys PaperFinishingTypes
    *  /resource/features/sys/paper-finishing-types
    *
    */
    Route::resource('/resource/features/sys/paper-finishing-types', 
        'App\Controllers\Control\Resource\Features\Sys\PaperFinishingTypes');
    /**
    * Resource for Features Sys PaperFinishingTypes
    *  /resource/features/sys/paper-finishing-types
    *
    */
    Route::resource('/resource/features/sys/finishing-productions-category', 
        'App\Controllers\Control\Resource\Features\Sys\FinishingProductionsCategory');

     /**
    * Resource for Features Sys PaperFinishingTypes
    *  /resource/features/sys/paper-finishing-types
    *
    */
    Route::resource('/resource/features/sys/finishing-productions', 
        'App\Controllers\Control\Resource\Features\Sys\FinishingProductions');


    /**
    * Resource for Features Sys PaperColors
    *  /resource/features/dex/paper-colors
    *
    */
    Route::resource('/resource/features/sys/paper-colors', 
        'App\Controllers\Control\Resource\Features\Sys\PaperColors');

    /**
    * Resource for Features Sys PaperSizes
    *  /resource/features/sys/paper-sizes
    *
    */
    Route::resource('/resource/features/sys/paper-sizes', 
        'App\Controllers\Control\Resource\Features\Sys\PaperSizes');

    /**
    * Resource for Features Sys BadDataErrorOptions
    *  /resource/features/sys/bad-data-errors/options
    *
    */
    Route::resource('/resource/features/sys/bad-data-errors/options', 
        'App\Controllers\Control\Resource\Features\Sys\BadDataErrors\Options');

    /**
    * Resource for Features Sys BadDataErrors
    *  /resource/features/sys/bad-data-errors
    *
    */
    Route::resource('/resource/features/sys/bad-data-errors', 
        'App\Controllers\Control\Resource\Features\Sys\BadDataErrors');

//