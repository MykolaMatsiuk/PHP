<?php

// Admin routes
Route::group(['namespace' => 'Admin'], function() {
  Route::get('/admin/home', 'AdminController@index');
  Route::resource('/admin/categories', 'CategoryController');
  Route::resource('/admin/items', 'ItemController');
  Route::resource('/admin/tags', 'TagController');
  Route::resource('/admin/sizes', 'SizeController');
  Route::resource('/admin/comments', 'CommentController');
  Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
  Route::post('admin-login', 'Auth\LoginController@login')->name('admin.login');
});

Route::get('/', 'HomeController@index');
Route::get('/items/{item}', 'ItemsController@show');
Route::get('/orders', 'OrdersController@index');
Route::get('/orders/{order}', 'OrdersController@show');
Route::get('/search', 'SearchController@search');
Route::post('/savecomments', 'CommentsController@store');
Route::get('/cart', 'CartController@index');

Auth::routes();
