<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    // Authentication
    Route::auth();

    // Pages
    Route::get('/', 'HomeController@index');

    // Urls
    Route::resource('url', 'UrlsController');
    Route::get('/{url}', [
        'as'    => 'url.redirect',
        'uses'  => 'UrlsController@redirect',
    ]);
});

