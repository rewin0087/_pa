<?php
    /**
    * Resource for Printing Payment
    * /resource/print/payment
    */
    Route::resource('/resource/print/payment', 
            'App\Controllers\Web\Resource\Printing\Payment');

    /**
    * Resource for Printing Final Summary
    * /resource/print/final-summary
    */
    Route::resource('/resource/print/final-summary', 
            'App\Controllers\Web\Resource\Printing\FinalSummary');

    /**
    * Resource for Printing Cart Summary
    * /resource/print/cart-summary
    */
    Route::resource('/resource/print/cart-summary', 
            'App\Controllers\Web\Resource\Printing\CartSummary');

    /**
    * Resource for Printing Upload Data
    * /resource/print/upload-data
    */
    Route::resource('/resource/print/upload-data', 
            'App\Controllers\Web\Resource\Printing\UploadData');

    /**
    * Resource for Printing Setup Finishing
    * /resource/print/setup-finishing
    */
    Route::resource('/resource/print/setup-finishing', 
            'App\Controllers\Web\Resource\Printing\SetupFinishing');

    /**
    * Resource for Printing Select Products
    * /resource/print/select-products
    */
    Route::resource('/resource/print/select-products', 
            'App\Controllers\Web\Resource\Printing\SelectProducts');

    /**
    *
    *  /resource/print/setup-options/setup-paper/cart  Route
    *
    */
    Route::get('/resource/print/setup-options/setup-paper/cart', 
        ['as' => 'printing.setup-options.setup-paper.cart',
        'uses' => 'App\Controllers\Web\Resource\Printing\SetupOptions@cart']
    );

    /**
    * Resource for Printing Select Products
    *  /resource/print/setup-options/setup-paper
    *
    */
    Route::resource('/resource/print/setup-options/setup-paper',
        'App\Controllers\Web\Resource\Printing\SetupOptions');

    /**
    * Resource for Printing Select Products
    *  /resource/print//shipping-details
    *
    */
    Route::resource('/resource/print/shipping-details',
        'App\Controllers\Web\Resource\Printing\ShippingDetails');

    /**
    * Resource for Printing Select Products
    * /resource/print/setup-options
    */
    Route::resource('/resource/print/setup-options', 
            'App\Controllers\Web\Resource\Printing\SetupOptions');

//-->