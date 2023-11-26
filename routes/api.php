<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('/v1')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/products', [\App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::post('/customers', [\App\Http\Controllers\Api\CustomerController::class, 'create']);
    Route::get('/invoices/pending', [\App\Http\Controllers\Api\InvoiceController::class, 'getPending']);
    Route::post('/vouchers/verify', [\App\Http\Controllers\Api\VoucherController::class, 'checkVoucher']);
    Route::post('/invoices/checkout', [\App\Http\Controllers\Api\InvoiceController::class, 'checkout']);



    Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {
        Route::post('/products', [\App\Http\Controllers\Api\ProductController::class, 'create']);
        Route::put('/products', [\App\Http\Controllers\Api\ProductController::class, 'update']);
        Route::delete('/products', [\App\Http\Controllers\Api\ProductController::class, 'delete']);

        Route::get('/customers', [\App\Http\Controllers\Api\CustomerController::class, 'index']);
        Route::put('/customers', [\App\Http\Controllers\Api\CustomerController::class, 'update']);
        Route::delete('/customers', [\App\Http\Controllers\Api\CustomerController::class, 'delete']);

        Route::get('/vouchers', [\App\Http\Controllers\Api\VoucherController::class, 'index']);
        Route::post('/vouchers', [\App\Http\Controllers\Api\VoucherController::class, 'create']);
        Route::put('/vouchers', [\App\Http\Controllers\Api\VoucherController::class, 'update']);
        Route::delete('/vouchers', [\App\Http\Controllers\Api\VoucherController::class, 'delete']);

        Route::get('/invoices', [\App\Http\Controllers\Api\InvoiceController::class, 'index']);
        Route::post('/invoices', [\App\Http\Controllers\Api\InvoiceController::class, 'create']);
        Route::put('/invoices', [\App\Http\Controllers\Api\InvoiceController::class, 'update']);
        Route::delete('/invoices', [\App\Http\Controllers\Api\InvoiceController::class, 'delete']);

        Route::get('/staffs', [\App\Http\Controllers\Api\StaffController::class, 'index']);
        Route::post('/staffs', [\App\Http\Controllers\Api\StaffController::class, 'create']);
        Route::put('/staffs', [\App\Http\Controllers\Api\StaffController::class, 'update']);
        Route::delete('/staffs', [\App\Http\Controllers\Api\StaffController::class, 'delete']);
    });

    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/login', [AuthController::class, 'login']);
});
