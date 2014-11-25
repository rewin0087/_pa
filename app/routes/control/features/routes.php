<?php

    /**
    * features/utility/paper-management  Route
    *
    */
    Route::get('/features/utility/printer-management', 
        ['as' => 'features.utility.printer-management',
        'uses' => 'App\Controllers\Control\Features\Utility@printerManagement']
    );

    /**
    * features/utility/coupons-and-discounts  Route
    *
    */
    Route::get('/features/utility/coupons-and-discounts', 
        ['as' => 'features.utility.coupons-and-discounts',
        'uses' => 'App\Controllers\Control\Features\Utility@couponsAndDiscounts']
    );

    /**
    * features/utility/points-and-rewards  Route
    *
    */
    Route::get('/features/utility/points-and-rewards', 
        ['as' => 'features.utility.points-and-rewards',
        'uses' => 'App\Controllers\Control\Features\Utility@pointsAndRewards']
    );

    /**
    * features/utility/promocodes  Route
    *
    */
    Route::get('/features/utility/promocodes', 
        ['as' => 'features.utility.promocodes',
        'uses' => 'App\Controllers\Control\Features\Utility@promocodes']
    );

    /**
    * features/config/translations  Route
    *
    */
    Route::get('/features/config/translations', 
        ['as' => 'features.config.translations',
        'uses' => 'App\Controllers\Control\Features\Config@translations']
    );

    /**
    * features/config/delivery-cut-off-time  Route
    *
    */
    Route::get('/features/config/delivery-cut-off-time', 
        ['as' => 'features.config.delivery-cut-off-time',
        'uses' => 'App\Controllers\Control\Features\Config@deliveryCutOffTime']
    );

	/**
    * features/config/logs  Route
    *
    */
    Route::get('/features/config/logs', 
        ['as' => 'features.config.logs',
        'uses' => 'App\Controllers\Control\Features\Config@logs']
    );

    /**
    * features/config/calendar  Route
    *
    */
    Route::get('/features/config/calendar', 
        ['as' => 'features.config.calendar',
        'uses' => 'App\Controllers\Control\Features\Config@calendar']
    );

    /**
    * features/config/configurations  Route
    *
    */
    Route::get('/features/config/configurations', 
        ['as' => 'features.config.configurations',
        'uses' => 'App\Controllers\Control\Features\Config@configurations']
    );

    /**
    * features/config/cut-off-time-settings  Route
    *
    */
    Route::get('/features/config/cut-off-time-settings', 
        ['as' => 'features.config.cut-off-time-settings',
        'uses' => 'App\Controllers\Control\Features\Config@cutOffTimeSettings']
    );

	/**
    * features/sys/paper-colors  Route
    *
    */ 
    Route::get('/features/sys/paper-colors', 
        ['as' => 'features.sys.paper-colors',
        'uses' => 'App\Controllers\Control\Features\Sys@paperColors']
    );
    
    /**
    * features/sys/paper-sizes  Route
    *
    */
    Route::get('/features/sys/paper-sizes', 
        ['as' => 'features.sys.paper-sizes',
        'uses' => 'App\Controllers\Control\Features\Sys@paperSizes']
    );
    
    /**
    * features/sys/paper-finishing-types  Route
    *
    */
    Route::get('/features/sys/paper-finishing-types', 
        ['as' => 'features.sys.paper-finishing-types',
        'uses' => 'App\Controllers\Control\Features\Sys@paperFinishingTypes']
    );

    /**
    * features/sys/finshing-productions  Route
    *
    */
    Route::get('/features/sys/finishing-productions', 
        ['as' => 'features.sys.finishing-productions',
        'uses' => 'App\Controllers\Control\Features\Sys@finishingProductions']
    );

    /**
    * features/sys/finshing-productions-category  Route
    *
    */
    Route::get('/features/sys/finishing-productions-category', 
        ['as' => 'features.sys.finishing-productions-category',
        'uses' => 'App\Controllers\Control\Features\Sys@finishingProductionsCategory']
    );
    
    /**
    * features/sys/bad-data-errors  Route
    *
    */
    Route::get('/features/sys/bad-data-errors', 
        ['as' => 'features.sys.bad-data-errors',
        'uses' => 'App\Controllers\Control\Features\Sys@badDataErrors']
    );

    /**
    * features/dex/paper-colors  Route
    *
    */
    Route::get('/features/dex/paper-colors', 
        ['as' => 'features.dex.paper-colors',
        'uses' => 'App\Controllers\Control\Features\Dex@paperColors']
    );
	
	/**
    * features/dex/paper-sizes  Route
    *
    */
    Route::get('/features/dex/paper-sizes', 
        ['as' => 'features.dex.paper-sizes',
        'uses' => 'App\Controllers\Control\Features\Dex@paperSizes']
    );
	
	/**
    * features/dex/paper-finishing-types  Route
    *
    */
    Route::get('/features/dex/paper-finishing-types', 
        ['as' => 'features.dex.paper-finishing-types',
        'uses' => 'App\Controllers\Control\Features\Dex@paperFinishingTypes']
    );
	
	/**
    * features/dex/bad-data-errors  Route
    *
    */
    Route::get('/features/dex/bad-data-errors', 
        ['as' => 'features.dex.bad-data-errors',
        'uses' => 'App\Controllers\Control\Features\Dex@badDataErrors']
    );

    /**
    * Require related Resource for features utility
    *
    *  
    */
    require app_path(). '/routes/control/features/resource/utility/routes.php';

    /**
    * Require related Resource for features config
    *
    *  
    */
    require app_path(). '/routes/control/features/resource/config/routes.php';

    /**
    * Require related Resource for features dex
    *
    *  
    */
    require app_path(). '/routes/control/features/resource/dex/routes.php';

    /**
    * Require related Resource for features sys
    *
    *  
    */
    require app_path(). '/routes/control/features/resource/sys/routes.php';

    /**
    * Require related Page for features sys/bad-data-errors
    *
    *  
    */
    require app_path(). '/routes/control/features/sys/bad-data-errors/routes.php';

    /**
    * Require related Page for features sys/paper-finishing-types
    *
    *  
    */
    require app_path(). '/routes/control/features/sys/paper-finishing-types/routes.php';

    /**
    * Require related Page for features sys/paper-finishing-types
    *
    *  
    */
    require app_path(). '/routes/control/features/sys/finishing-productions/routes.php';
//