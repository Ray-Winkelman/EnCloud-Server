<?php

use Illuminate\Auth\Middleware\Authenticate;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::post('register', 'Auth\RegisterController@register');

Route::get('/check', function () {
    if (Auth::check()) {
        return view('test');
    }
    else {
        return view('welcome');
    }
});

Route::get('/middle', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::get('/login', function() {
    return view('login');
})->name('login');