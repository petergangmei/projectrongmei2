<?php


Auth::routes();

//pages controller
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/posts', 'PagesController@posts');
Route::get('/videos', 'PagesController@videos');
Route::get('/myvideos', 'PagesController@myvideos');
Route::get('/audios', 'PagesController@audios');

//custom rout

//news post controller
Route::get('/post-id-{id}', 'PagesController@viewPost');

//comment controller
Route::Post('list', 'CommentsController@list');

Route::Post('/postcomment', 'CommentsController@postcomment');
Route::Post('/postcomment2', 'CommentsController@postcomment2');
Route::post('/deleteComment', 'CommentsController@deleteComment');

Route::delete('/commenttwodelete{id}', 'CommentsController@commenttwodelete');
Route::delete('/WithIMGcommentdelete{id}', 'CommentsController@WithIMGcommentdelete');


Route::delete('/commentReport{id?}', 'CommentsController@commentReport');



// Post controllers
Route::post('/store','PostsController@store');
Route::delete('/destroy{id}', 'PostsController@destroy');

Route::get('/dashboard', 'DashboardsController@index')->name('dashboard');


//proile picture controller
Route::post('/uploadprofile_img', 'UserdetailsController@uploadprofile_img');

//video controllers

Route::post('/uploadvideo','PostsController@uploadvideo');
Route::delete('/deletevideo{id}', 'PostsController@deletevideo');
Route::get('/myvideos', 'DashboardsController@myvideos')->name('myvideos');
//video video upload , edit

Route::get('/video-id-{id?}', 'MediasController@videoShow');
Route::get('/search/{key}', 'MediasController@search');


//audio controller
Route::post('/uploadaudio','PostsController@uploadaudio');
Route::delete('/deletevaudio{id}', 'PostsController@deleteaudio');

Route::get('/myaudios', 'DashboardsController@myaudios')->name('audios');

