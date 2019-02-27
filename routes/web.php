<?php

use App\Transaction;
use App\Http\Resources\Transaction as TransactionResource;

Auth::routes();

Route::redirect('/', 'ads');

Route::get('ads', 'AdController@index');
Route::get('ads/{ad}', 'AdController@show');
Route::post('notification/{user}', 'NotificationController');
Route::get('api/transactions', function () {
    // return Transaction::with(['ad', 'user'])->get();
    // return TransactionResource::collection(Transaction::with(['ad', 'user']))->get();
    return TransactionResource::collection(Transaction::all());
});

Route::resource('admin/ads', 'Admin\AdController');
