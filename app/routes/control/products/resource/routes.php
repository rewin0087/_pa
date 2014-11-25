<?php
    
    /**
    * Resource for Product Printing PaperTypes Reloading
    * /resource/products/printing/paper-types/reloading
    */
    Route::resource('/resource/products/printing/paper-types/reloading', 
            'App\Controllers\Control\Resource\Products\Printing\PaperTypes\Reloading');

    /**
    * Resource for Product Printing PaperTypes
    * /resource/products/printing/paper-types
    */
    Route::resource('/resource/products/printing/paper-types', 
            'App\Controllers\Control\Resource\Products\Printing\PaperTypes');

    /**
    * Resource for Product Printing 
    * /resource/products/printing
    */
    Route::resource('/resource/products/printing', 
            'App\Controllers\Control\Resource\Products\Printing');
//