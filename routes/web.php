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

Route::get('item', 'SiteController@item');
Route::get('list', 'SiteController@list');
Route::get('done', 'SiteController@done');
Route::get('/', 'SiteController@index');
