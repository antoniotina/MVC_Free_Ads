<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('/profile/{user}', 'UserController@index')->name('profile.show');

Route::get('/profile/{user}/edit', 'UserController@edit')->name('profile.edit');

Route::patch('/profile/{user}', 'UserController@update')->name('profile.update');

Route::patch('/profile/{user}', 'UserController@delete')->name('profile.delete');

Route::get('/profile', 'UserController@index')->name('profile');

Route::get('/home', 'UserController@index')->name('home');

Route::get('/index', 'UserController@index')->name('home');