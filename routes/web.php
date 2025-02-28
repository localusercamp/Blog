<?php

// Доступны любому пользователю
Route::middleware('authguard.logged_only')->group(function () {
    Route::get('/post/create', 'PostController@create');
    Route::post('/post/store', 'PostController@store');
    Route::get('/post/edit/{id}', 'PostController@edit');
    Route::post('/post/destroy', 'PostController@destroy');
    Route::post('/post/update', 'PostController@update');
    Route::post('/commentary/store', 'CommentaryController@store');
    Route::post('/commentary/destroy', 'CommentaryController@destroy');
    Route::post('/commentary/update', 'CommentaryController@update');
    Route::post('/logout', 'LoginController@logout');
});

// Доступны только админу
Route::middleware(['authguard.logged_only','authguard.admin_only'])
    ->group(function () {
        Route::get('/role/create', 'RoleController@create');
        Route::post('/role/store', 'RoleController@store');
        Route::get('/category/create', 'CategoryController@create');
        Route::post('/category/store', 'CategoryController@store');
});

// Доступны только гостю приложения
Route::middleware('authguard.guest_only')->group(function () {
    Route::get('/register', function () {
        return View::make('pages.register');
    });
    Route::get('/login', function () {
        return View::make('pages.login');
    });
    Route::post('/register', 'RegistrationController@create');
    Route::post('/login', 'LoginController@login');
});

// Общедоступны
Route::get('/home', function () { 
    return View::make('pages.home');
});
Route::get('/post/show/{id}', 'PostController@show');
Route::get('/user/show/{id}', 'UserController@show');
Route::post('/check-if-logged', 'LoginController@check');

// Не внесены в api, потому что используют Auth
Route::prefix('api')->group(function () {
    Route::post('/like', 'PostController@like');
    Route::post('/posts-by-filter-category', 'PostController@postsBy');
    Route::post('/get-post', 'PostController@getPost');
    Route::post('/get-user', 'UserController@getUser');
    Route::middleware('authguard.logged_only')
        ->post('/get-current-user', 'UserController@getCurrentUser');
});