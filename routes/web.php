<?php

Route::namespace('Home')->group(function () {
    Route::get('/', 'FrontendController@home');
    Route::post('/contact', 'FrontendController@contact');
    Route::patch('/images/user/{user}', 'FrontendController@image_update');
    Route::get('/admin', 'AdminController@home')->middleware('admin');
});

Route::namespace('MyAuth')->group(function () {
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');
});

Route::group(['namespace' => 'MyAuth', 'prefix' => 'register'], function () {
    Route::post('/', 'RegisterController@register');
    Route::get('/{remember_token}', 'RegisterController@activate');
});

Route::group(['namespace' => 'Resource', 'prefix' => 'posts'], function () {
    Route::get('/{post}', 'PostController@show');
    Route::resource('{post}/comments', 'CommentController')->except(['show', 'index', 'create', 'edit']);
});

Route::group(['namespace' => 'Resource', 'prefix' => 'admin',  'middleware' => 'admin'], function () {
    Route::resource('/users', 'UserController')->except('show');
    Route::resource('/posts', 'PostController')->except('show');
    Route::resource('/sliders', 'SliderController')->except('show');
    Route::resource('/menus', 'MenuController')->except('show');
    Route::resource('/trainers', 'TrainerController')->except('show');
    Route::resource('/prices', 'PriceController')->except('show');
    Route::resource('/services', 'ServiceController')->except('show');
    Route::resource('/socials', 'SocialController')->except('show');
});

Route::fallback(function() {
    abort(404);
});