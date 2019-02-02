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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('video', 'VideoController')->middleware('auth');

Route::get('playlist/test', 'PlaylistController@test');
Route::get('playlist/videoadd', 'PlaylistController@videoAdd')->name('videoadd');;
Route::get('playlist/videodel', 'PlaylistController@videoDel')->name('videodel');;
Route::resource('playlist', 'PlaylistController')->middleware('auth');

Route::get('statistics', 'StatisticController@index')->middleware('auth')->name('statistics');

Route::get('request', 'RequestController@create')->name('request.create');
Route::post('request', 'RequestController@store')->name('request.store');