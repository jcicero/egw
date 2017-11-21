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
Route::resource('/church', 'ChurchController');
Route::resource('/author','AuthorController');
Route::resource('/member','MemberController');
Route::resource('/publisher','PublisherController');
Route::resource('/status','StatusController');
Route::resource('/book','BookController');

