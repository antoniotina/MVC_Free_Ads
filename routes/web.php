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

Route::get('/index', 'IndexController@index')->name('index');

Route::get('/home', 'UserController@index')->name('home');

Route::get('/profile/{user}', 'UserController@index')->name('profile.show');

Route::get('/annonce/all', 'AnnonceController@showAll')->name('annonce.showall');

// NEED TO CREATE A GET ROUTE FOR EACH PUT/PATCH/POST SO THAT ANY NON AUTH USER CAN'T JUST ACCESS IT
Route::get('/annonce/add', 'AnnonceController@add')->name('annonce.add');

Route::get('/profile/{user}/update', 'UserController@update')->name('profile.update');

Route::get('/profile/{user}/annonces', 'UserController@listAnnonces')->name('profile.listannonces');

Route::get('/annonce/{annonce}/update', 'AnnonceController@update')->name('annonce.update');

Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function () {

    Route::get('/profile', 'UserController@index')->name('profile');

    Route::delete('/profile/{user}/delete', 'UserController@delete')->name('delete');

    Route::get('/profile/{user}/edit', 'UserController@edit')->name('profile.edit');

    Route::put('/profile/{user}/update', 'UserController@update')->name('profile.update');

    Route::get('/annonce/create', 'AnnonceController@create')->name('annonce.create');

    Route::put('/annonce/add', 'AnnonceController@add')->name('annonce.add');

    Route::get('/annonce/{annonce}/edit', 'AnnonceController@edit')->name('annonce.edit');

    Route::put('/annonce/{annonce}/update', 'AnnonceController@update')->name('annonce.update');

    Route::delete('/annonce/{annonce}/delete', 'AnnonceController@delete')->name('annonce.delete');
});
