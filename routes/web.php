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
Route::post('/update', 'HomeController@update')->name('update');
Route::get('/admin_home', 'HomeController@index')->name('admin_home');
Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
Route::post('/update_user', 'HomeController@update_user')->name('update_user');
Route::get('/create_user', 'HomeController@create_user_form')->name('create_user');
Route::post('/submit_create_user', 'HomeController@submit_create_user')->name('submit_create_user');
Route::get('/delete/{id}', 'HomeController@delete')->name('delete');
