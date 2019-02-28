<?php

use App\User;

Auth::routes();

Route::redirect('/', 'ads');

Route::resource('ads', 'AdController');
Route::post('restore/ads/{id}', 'AdController@restore');
Route::get('users/{user}/ads', 'AdController@myAds')->name('myads');

Route::post('notification/{user}', 'NotificationController');
