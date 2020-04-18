<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('/index', 'IndexController@index')->name('index');

Route::get('/home', 'IndexController@index')->name('home');

Route::get('/profile/{user}', 'UserController@index')->name('profile.show');

Route::get('/annonce/all', 'AnnonceController@showAll')->name('annonce.showall');

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

    Route::get('/profile/{user}/sendm', 'MessageController@create')->name('message.create');

    Route::put('/message/{user}/send', 'MessageController@add')->name('message.add');

    Route::get('/message/{user}/show', 'MessageController@show')->name('message.show');

    Route::put('/profile/{user}/update', 'UserController@update')->name('profile.update');

    Route::get('/annonce/create', 'AnnonceController@create')->name('annonce.create');

    Route::put('/annonce/add', 'AnnonceController@add')->name('annonce.add');

    Route::get('/annonce/{annonce}/edit', 'AnnonceController@edit')->name('annonce.edit');

    Route::put('/annonce/{annonce}/update', 'AnnonceController@update')->name('annonce.update');

    Route::delete('/annonce/{annonce}/delete', 'AnnonceController@delete')->name('annonce.delete');
    
    Route::get('/annonce/search', 'AnnonceController@searchAd')->name('annonce.search');
});
