<?php

Auth::routes();

Route::redirect('/', 'ads');

Route::get('ads', 'AdController@index');
Route::get('ads/{ad}', 'AdController@show');
Route::post('send-email/{user}', 'SendEmailController');

Route::resource('admin/ads', 'Admin\AdController');
