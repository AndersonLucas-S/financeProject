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


Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('auth');

Route::get('balance', [App\Http\Controllers\BalanceController::class, 'index'])->name('balance')->middleware('auth');
Route::get('deposit', [App\Http\Controllers\BalanceController::class, 'deposit'])->name('balance.deposit')->middleware('auth');
Route::post('deposit', [App\Http\Controllers\BalanceController::class, 'depositStore'])->name('deposit.store')->middleware('auth');
Route::get('withdrawn', [App\Http\Controllers\BalanceController::class, 'withdraw'])->name('withdrawn')->middleware('auth');
Route::post('withdrawn', [App\Http\Controllers\BalanceController::class, 'withdrawStore'])->name('withdrawn.store')->middleware('auth');
Route::get('transfer', [App\Http\Controllers\BalanceController::class, 'transfer'])->name('transfer')->middleware('auth');
Route::post('confirm-transfer', [App\Http\Controllers\BalanceController::class, 'confirmTransfer'])->name('transfer.confirm')->middleware('auth');
Route::post('transfer', [App\Http\Controllers\BalanceController::class, 'transferStore'])->name('transfer.store')->middleware('auth');
Route::get('historic', [App\Http\Controllers\BalanceController::class, 'historic'])->name('historic')->middleware('auth');
Route::post('historic', [App\Http\Controllers\BalanceController::class, 'searchHistoric'])->name('historic.search')->middleware('auth');


Route::post('/', [App\Http\Controllers\BalanceController::class, 'userStore'])->name('user.store');

Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('home');

Auth::routes();
