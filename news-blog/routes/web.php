<?php

Auth::routes();

//Admin routes
Route::group(['namespace' => 'Admin'], function() {
  Route::resource('/admin/news', 'NewController');
  Route::resource('/admin/tags', 'TagController');
  Route::resource('admin/categories', 'CategoryController');
  Route::resource('/admin/comments', 'CommentController');
  Route::resource('/admin/commercials', 'CommercialController');
  Route::resource('/admin/menu', 'MenuController');
  Route::resource('admin/submenu', 'SubmenuController');
  Route::resource('admin/subsubmenu', 'SubsubmenuController');
  Route::get('/admin/home', 'AdminController@index');
  Route::get('/admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/admin-login', 'Auth\LoginController@login');
});


//User routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'CategoryController@index');
Route::get('/search', 'SearchController@filter');
Route::get('/comments/{user}', 'CommentsController@index');
Route::get('/{category}', 'CategoryController@show');
Route::get('/{category}/{news}', 'NewsController@index');
Route::get('/{category}/{news}/{tag}', 'TagController@getNews');
Route::post('/{category}/{news}/comments', 'CommentsController@store');


