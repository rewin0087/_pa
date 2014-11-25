<?php

    /**
    *  /features/sys/paper-finishing-types/options/{id}/{dex_code} Route
    *
    */
    Route::get('/features/sys/finishing-productions-category/options/{id}/{category_name}', 
        ['as' => 'features.sys.finishing-productions-category.options',
        'uses' => 'App\Controllers\Control\Features\Sys\FinishingProductionsCategory\Options@show']);