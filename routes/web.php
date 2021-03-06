<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();


Route::any('/', function () {
    return redirect('login');
});

Route::any('home', function () {
    return view('home');
})->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'files'], function () {
        Route::get('/', 'FilesController@index');
        Route::post('/', 'FilesController@post');
        Route::put('/', 'FilesController@put');
        Route::delete('/', 'FilesController@delete');

        Route::get('/{file}', 'FilesController@get');
    });

    Route::any('upload', function () {
        return view('upload');
    });
});