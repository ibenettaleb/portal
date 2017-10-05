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

Auth::routes();

Route::get('/', 'ProjectController@index');

Route::resource('app', 'ProjectController');

//Other Route
Route::get('destroy','ProjectController@destroy');

Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'ProjectController@pagenotfound']);

Route::get('/markAsRead', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    $user->unreadNotifications->markAsRead();
    $user->notifications()->delete();
});


