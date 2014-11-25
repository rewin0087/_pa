<?php

    /**
    *  /features/sys/bad-data-errors/options/{id} Route
    *
    */
    Route::get('/features/sys/bad-data-errors/options/{id}/{dex_code}', 
        ['as' => 'features.sys.bad-data-errors.options',
        'uses' => 'App\Controllers\Control\Features\Sys\BadDataErrors\Options@show']);