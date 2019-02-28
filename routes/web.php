<?php

use App\User;

Auth::routes();

Route::redirect('/', 'ads');

Route::resource('ads', 'AdController');

Route::post('notification/{user}', 'NotificationController');
