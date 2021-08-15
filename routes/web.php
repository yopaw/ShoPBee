<?php
namespace App\Http\Controllers;
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

Route::get('/', HomeController::class);

Route::get('/home', function () {
    return view('pages/home');
});

Route::get('/transactions',[TransactionController::class, 'index']);
Route::get('/vouchers', [VoucherController::class,'index']);
Route::get('/vouchers/create', [VoucherController::class, 'create']);

Route::get('/requests',[RequestController::class,'index']);

Route::put('/requests/edit',[RequestController::class,'update'])->name('requests.update');
Route::get('/insert',[ProductController::class, 'create']);
Route::post('/insert',[ProductController::class, 'store'])->name('products.store');

Route::get('/detail/{product}', [ProductController::class,'show']);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
