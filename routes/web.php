<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () { // представление регистрации пользователя
    return view('register');
});




Route::get('/testvue', function () {
    return view('testvue');
});

Route::get('/testjson', 'PostController@index');
