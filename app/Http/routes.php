<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use App\Http\Controllers\PagesController;


Route::get('/', function () {
    return view('welcome');
    // return ('welp');
});


Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::get('/uploadTest', 'PagesController@uploadTest');

// Route::post('', 'PagesController@receiveImage');

// is this necessary when we're calling PagesController@receiveImage directly
// in the form action?
Route::post('/receiveImage', 'PagesController@receiveImage');

Route::resource('posts', 'PostsController');
Route::auth();

Route::get('/dashboard', 'DashboardController@index');
