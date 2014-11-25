<?php

    /**
    *
    *  printing/product/{id}/detail/{en_name}  Route
    *
    */
    Route::get('/printing/product/{id}/detail/{en_name}', 
        ['as' => 'printing.product.detail',
        'uses' => 'App\Controllers\Web\Printing\Product\Detail@index']
    );

//-->