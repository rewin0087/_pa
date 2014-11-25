<?php


/**
* Front Website group
* Description: Please include only the file of each routes inside the routes/web folder
*
* example: routes/web/user.php this shoud include all the routes related to user for front website
*       always put comments of each included route file 
*
*/

    Route::get('/', 'App\Controllers\Web\Home@index');    

    # media file image parser
    Route::get('/media/image/{id}/{name}', 'App\Controllers\Web\Media@image');

    # require print route and related routes
    require app_path(). '/routes/web/printing/routes.php';

    # require me route and related routes
    require app_path(). '/routes/web/me/routes.php';

    # require me route and related routes
    require app_path(). '/routes/web/users/routes.php';
    
    # require user resource route and related routes
    require app_path(). '/routes/web/users/resource/routes.php'; 

    require app_path(). '/routes/web/me/resource/address/routes.php'; 

    require app_path(). '/routes/web/me/resource/info/routes.php'; 

    require app_path(). '/routes/web/me/resource/email/routes.php'; 

    require app_path(). '/routes/web/me/resource/password/routes.php'; 


//