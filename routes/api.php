<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, '__invoke']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/paket', [PaketController::class, 'index']);
        Route::get('/paket/{id}', [PaketController::class, 'show']);
        Route::post('/paket', [PaketController::class, 'store']);
        Route::put('/paket/{id}', [PaketController::class, 'update']);
        Route::delete('/paket/{id}', [PaketController::class, 'destroy']);
        Route::get('/search', [PaketController::class, 'search']);
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/transaksi', [TransaksiController::class, 'index']);
        Route::post('/transaksi', [TransaksiController::class, 'store']);
        Route::put('/transaksi/{id}', [TransaksiController::class, 'update']);
        Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/report', [ReportController::class, 'report']);
        Route::get('/report/period', [ReportController::class, 'period']);
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/customers', [CustomerController::class, 'index']);
        Route::post('/customers', [CustomerController::class, 'store']);
        Route::get('/customers/show/{id}', [CustomerController::class, 'show']);
        Route::put('/customers/{id}', [CustomerController::class, 'update']);
        Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);
    });
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
