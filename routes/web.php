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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('church', 'ChurchController');
Route::resource('/autores','AuthorController');
Route::resource('/membros','MemberController');
Route::resource('/editoras','PublisherController');
Route::resource('/status','StatusController');

