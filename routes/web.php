<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackagePriceController;
use App\Http\Controllers\SubdivisionController;
use App\Http\Controllers\TransportationController;

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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    // customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    // subdivision
    Route::get('/subdivision', [SubdivisionController::class, 'index'])->name('subdivision');
    Route::post('/subdivision/store', [SubdivisionController::class, 'store'])->name('subdivision.store');
    Route::put('/subdivision/update/{id}', [SubdivisionController::class, 'update'])->name('subdivision.update');
    Route::delete('/subdivision/destroy/{id}', [SubdivisionController::class, 'destroy'])->name('subdivision.destroy');
    // transportation
    Route::get('/transportation', [TransportationController::class, 'index'])->name('transportation');
    Route::post('/transportation/store', [TransportationController::class, 'store'])->name('transportation.store');
    Route::put('/transportation/update/{id}', [TransportationController::class, 'update'])->name('transportation.update');
    Route::delete('/transportation/destroy/{id}', [TransportationController::class, 'destroy'])->name('transportation.destroy');
    // package price
    Route::get('/package_price', [PackagePriceController::class, 'index'])->name('package_price');
    Route::post('/package_price/store', [PackagePriceController::class, 'store'])->name('package_price.store');
    Route::put('/package_price/update/{id}', [PackagePriceController::class, 'update'])->name('package_price.update');
    Route::delete('/package_price/destroy/{id}', [PackagePriceController::class, 'destroy'])->name('package_price.destroy');
});
