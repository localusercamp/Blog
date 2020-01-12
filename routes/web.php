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

Route::post('/login', 'LoginController@login');
Route::post('/register', 'RegistrationController@create');
Route::post('/check-if-logged', 'LoginController@check');
Route::post('/logout', 'LoginController@logout');

Route::get('/role/create', 'RoleController@create');
Route::post('/role/store', 'RoleController@store');

Route::get('/category/create', 'CategoryController@create');
Route::post('/category/store', 'CategoryController@store');

Route::get('/post/create', 'PostController@create');
Route::post('/post/store', 'PostController@store');

Route::post('/api/like', 'PostController@like');

////////////

Route::get('/admin', function () { // представление входа пользователя
    return View::make('layouts.admin');
});
// Route::get('/testvue', function () {
//     return view('testvue');
// });

// Route::get('/testjson', 'PostController@index');

// Route::get('/tohome', function () { 
//     return Redirect::to("/home");
// });