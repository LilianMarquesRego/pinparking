<?php

Route::namespace('Api')->group(function () {
    Route::get('transactions', 'ApiController@transactions');

    Route::get('users', 'ApiController@users');

    Route::get('ads', 'ApiController@ads');
});
