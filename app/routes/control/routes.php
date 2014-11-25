<?php


/**
* Control Website group
* Description: Please include only the file of each routes inside the routes/web folder
*
* example: routes/web/user.php this shoud include all the routes related to user for front website
*       always put comments of each included route file 
*
*/
Route::group(array('domain' => Config::get('app.subdomain.control').'.'.Config::get('app.domain')), function()
{

    Route::get('/', 'App\Controllers\Control\Home@index');

    # login page
    Route::get('/login', 'App\Controllers\Control\Login@index');

    # media file image parser
    Route::get('/media/image/{id}/{name}', 'App\Controllers\Control\Media@image');

    # require users route and related routes
    require app_path(). '/routes/control/products/routes.php'; 

    # require users route and related routes
    require app_path(). '/routes/control/users/routes.php'; 
	
	# require features route and related routes
    require app_path(). '/routes/control/features/routes.php'; 
	
});

//