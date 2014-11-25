<?php

    /**
    *  /features/sys/paper-finishing-types/options/{id}/{dex_code} Route
    *
    */
    Route::get('/features/sys/paper-finishing-types/options/{id}/{dex_code}', 
        ['as' => 'features.sys.paper-finishing-types.options',
        'uses' => 'App\Controllers\Control\Features\Sys\PaperFinishingTypes\Options@show']);