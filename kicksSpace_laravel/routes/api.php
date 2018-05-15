<?php

use Illuminate\Http\Request;


Route::get('/getitems', 'AjaxController@getItems');
Route::get('/getcomments', 'AjaxController@getComments');
Route::get('/getcategories', 'AjaxController@getCategories');
Route::post('/upvote', 'AjaxController@upVote');
Route::post('/downvote', 'AjaxController@downVote');
Route::get('/getautocomplete', 'AjaxController@getAutocompleteResults');
Route::post('/savecomments', 'AjaxController@storeComments');
Route::post('/makeorder', 'AjaxController@makeOrder');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
