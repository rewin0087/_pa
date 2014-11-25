<?php
    /**
    * Resource for Features Utility PrinterManagement
    *  /resource/features/utility/printer-management
    *
    */
    Route::resource('/resource/features/utility/printer-management', 
        'App\Controllers\Control\Resource\Features\Utility\PrinterManagement');

    /**
    * Resource for Features Utility Promocodes
    *  /resource/features/utility/promocodes
    *
    */
    Route::resource('/resource/features/utility/promocodes', 
        'App\Controllers\Control\Resource\Features\Utility\Promocodes');