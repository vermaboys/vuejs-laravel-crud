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
/*Blog Routes*/
Route::get('/blogs', 'BlogController@getData');
Route::get('/single-post/{id}', 'BlogController@singlePost');
Route::post('/add-post', 'BlogController@addPost');
Route::get('/post-edit/{id}', 'BlogController@getEditData');
Route::post('/post-update/{id}', 'BlogController@update');
Route::any('/delete/{id}', 'BlogController@destroy');
/*Table Routes*/
Route::get('/table/{page?}', 'TableController@getData');
Route::any('/add-tableinfo', 'TableController@addInfo');
Route::get('/info-edit/{id}', 'TableController@getEditData');
Route::post('/update-info/{id}', 'TableController@update');
Route::any('/delete-info/{id}', 'TableController@destroy');