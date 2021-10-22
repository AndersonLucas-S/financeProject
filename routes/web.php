<?php


$this->group(['middleware' => ['auth']], function(){

    Route::get('/admin', 'AdminController@index')->name('admin');

    //rotas saldo
    Route::get('/balance', 'BalanceController@index')->name('balance');

    // rotas depósito
    Route::get('balance/deposit', 'BalanceController@deposit')->name('balance.deposit');
    Route::post('/deposit', 'BalanceController@depositStore')->name('deposit.store');

    //rotas saque
    Route::get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');
    Route::post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');

    //rotas transferência
    Route::get('transfer', 'BalanceController@transfer')->name('balance.transfer');
    Route::post('confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');
    Route::post('transfer', 'BalanceController@transferStore')->name('transfer.store');

    //rotas histrico
    Route::get('historic', 'BalanceController@historic')->name('historic');
    Route::any('historic-search', 'BalanceController@searchHistoric')->name('historic.search');

});

Route::get('/', 'SiteController@index')->name('home');
Route::post('/', 'BalanceController@userStore')->name('user.store');


Auth::routes();

