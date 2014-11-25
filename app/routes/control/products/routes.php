<?php

    /**
    * /products/printing/paper-types/{id}/reloading
    *
    */
    Route::get('/products/printing/paper-types/{id}/reloading/{en_name}',
            ['as' => 'products.printing.paper-types.realoading',
            'uses' => 'App\Controllers\Control\Products\Printing\PaperTypes\Reloading@index']);

    /**
    * /products/printing/paper-type
    *
    */
    Route::get('/products/printing/paper-type/{id}/{en_name}',
            ['as' => 'products.printing.paper-type',
            'uses' => 'App\Controllers\Control\Products\Printing@paperType']);

    /**
    * products/print Route
    *
    */
    Route::get('/products/printing', 
        ['as' => 'products.printing',
        'uses' => 'App\Controllers\Control\Products@printing']
    );

    /**
    * products/printing/paper-types/{print_product_id}/download/excel/{file_id}/{file_name} Route
    *
    */
    Route::get('products/printing/paper-types/{print_product_id}/download/excel/{file_id}/{file_name}', 
        ['as' => 'products.printing.paper-types.download',
        'uses' => 'App\Controllers\Control\Products\Printing\PaperTypes\Download@excel']
    );

    /**
    * Require related Resource for products
    *
    */
    require app_path(). '/routes/control/products/resource/routes.php';
//