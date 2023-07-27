<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackagePriceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StatusController;
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
Route::get('/status/{resi}', [App\Http\Controllers\FrontController::class, 'status'])->name('status');
Route::post('/search_resi', [App\Http\Controllers\FrontController::class, 'search_resi'])->name('search_resi');

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
    // slider
    Route::get('/slider', [SliderController::class, 'index'])->name('slider');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::put('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    // statuses
    Route::get('/statuses', [StatusController::class, 'index'])->name('statuses');
    Route::post('/statuses/store', [StatusController::class, 'store'])->name('statuses.store');
    Route::put('/statuses/update/{id}', [StatusController::class, 'update'])->name('statuses.update');
    Route::delete('/statuses/destroy/{id}', [StatusController::class, 'destroy'])->name('statuses.destroy');
    // orders
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/invoice', [OrderController::class, 'invoice'])->name('invoice');
    Route::get('/order/{resi}', [OrderController::class, 'show'])->name('show');
    Route::get('/order/print/{id}', [OrderController::class, 'print'])->name('order.print');
    Route::get('/order/printInvoice/{id}', [OrderController::class, 'printInvoice'])->name('order.printInvoice');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::post('/order/storeStatus', [OrderController::class, 'storeStatus'])->name('order.storeStatus');
    Route::put('/order/update/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('/order/destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::delete('/order/destroyStatus/{id}', [OrderController::class, 'destroyStatus'])->name('order.destroyStatus');
    //order status update
    Route::get('/update_status', [OrderController::class, 'update_status'])->name('update_status');
    Route::get('/status', [OrderController::class, 'cek_resi'])->name('cek_resi');
    //user
    Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('user/akun', [App\Http\Controllers\UserController::class, 'akun'])->name('user.akun');
    Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::put('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    //laporan
    Route::get('report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');
    Route::post('/report/export', [App\Http\Controllers\ReportController::class, 'export'])->name('report.export');
});
