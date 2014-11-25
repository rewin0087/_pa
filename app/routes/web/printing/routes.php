<?php
    
    /**
    *
	*  printing/select-product  Route
    *
    */
    Route::get('/printing/select-product', 
        ['as' => 'printing.select-product',
        'uses' => 'App\Controllers\Web\Printing@selectProduct']
    );

 	/**
    *
	*  printing/setup-options  Route
    *
    */
    Route::get('/printing/setup-options', 
        ['as' => 'printing.setup-options',
        'uses' => 'App\Controllers\Web\Printing@setupOptions']
    );

    /**
    *
    *  printing/setup-finishing  Route
    *
    */
    Route::get('/printing/setup-finishing', 
        ['as' => 'printing.setup-finishing',
        'uses' => 'App\Controllers\Web\Printing@setupFinishing']
    );

    /**
    *
    *  printing/upload-data  Route
    *
    */
    Route::get('/printing/upload-data', 
        ['as' => 'printing.upload-data',
        'uses' => 'App\Controllers\Web\Printing@uploadData']
    );

    /**
    *
    *  printing/cart-summary  Route
    *
    */
    Route::get('/printing/cart-summary', 
        ['as' => 'printing.cart-summary',
        'uses' => 'App\Controllers\Web\Printing@cartSummary']
    );

    /**
    *
    *  printing/shipping-details  Route
    *
    */
    Route::get('/printing/shipping-details', 
        ['as' => 'printing.shipping-details',
        'uses' => 'App\Controllers\Web\Printing@shippingDetails']
    );

    /**
    *
    *  printing/final-summary  Route
    *
    */
    Route::get('/printing/final-summary', 
        ['as' => 'printing.final-summary',
        'uses' => 'App\Controllers\Web\Printing@finalSummary']
    );

    /**
    *
    *  printing/done  Route
    *
    */
    Route::get('/printing/{order_id}/done/{hash_created_at}', 
        ['as' => 'printing.done',
        'uses' => 'App\Controllers\Web\Printing@done']
    );

    /**
    * Require related routes for printing product
    *
    */
    require app_path(). '/routes/web/printing/product/routes.php';

    /**
    * Require related Resource for print
    *
    */
    require app_path(). '/routes/web/printing/resource/routes.php';

//