<?php
    
        /**
        * Resource for Users Group
        * /resource/users/group
        */
        Route::resource('resource/users/groups', 
                'App\Controllers\Control\Resource\Users\Group');

        /**
        * Resource for Customers
        * /resource/users/customers
        */
        Route::resource('resource/users/customers', 
                'App\Controllers\Control\Resource\Users\Customers');

        /**
        * Resource for Backends
        * /resource/users/backends
        */
        Route::resource('resource/users/backends', 
                'App\Controllers\Control\Resource\Users\Backends');
    

//