<?php

use Illuminate\Http\Request;

Route::get('/getviewers', 'AjaxController@getViewers');
Route::get('/gettags', 'AjaxController@getTags');
Route::get('/getvotes', 'AjaxController@getVotes');
Route::post('/upvote', 'AjaxController@upVote');
Route::post('/downvote', 'AjaxController@downVote');
Route::get('/getcommercial', 'AjaxController@getCommercial');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
