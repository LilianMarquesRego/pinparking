<?php

Auth::routes();

Route::redirect('/', 'ads');

Route::get('ads', 'AdController@index');

Route::resource('admin/ads', 'Admin\AdController');
