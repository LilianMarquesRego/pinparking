<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('ads', 'AdController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
