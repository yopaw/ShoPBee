<?php
namespace App\Http\Controllers;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\ValidateSeller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/home', [ProductController::class,'index']);

Route::get('/login', \App\Http\Controllers\Auth\LoginController::class)->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.authenticate');
Route::get('/transactions',[TransactionController::class, 'index']);
Route::get('/vouchers', [VoucherController::class,'index']);
Route::get('/vouchers/create', [VoucherController::class, 'create']);

Route::get('/requests',[RequestController::class,'index']);
Route::get('/requests/create', [RequestController::class,'create']);
Route::post('/requests/store/{user}', [RequestController::class,'store'])->name('requests.store');
Route::put('/requests/edit',[RequestController::class,'update'])->name('requests.update');

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('app/products/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);


    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('image');

Route::middleware([Authenticate::class, ValidateSeller::class])->prefix('products')->name('products.')->group(function(){
    Route::get('/create',[ProductController::class, 'create']);
    Route::post('/store',[ProductController::class, 'store'])->name('store');
});

Route::get('/reviews/create/{transaction}', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews/store/{transaction}', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/detail/{product}', [ProductController::class,'show'])->name('products.show');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
