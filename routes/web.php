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
    return View::make('pages.register');
});

Route::get('/login', function () { // представление входа пользователя
    return View::make('pages.login');
});

Route::get('/home', function () { 
    return View::make('pages.home');
});

Route::post('/login', 'LoginController@login'); // запрос на API для входа пользователя
Route::post('/register', 'RegistrationController@create'); // запрос на API для создания нового поьзователя


////////////
Route::get('/testvue', function () {
    return view('testvue');
});
Route::post('/login/check', 'LoginController@check');

Route::get('/testjson', 'PostController@index');