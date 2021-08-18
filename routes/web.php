<?php
namespace App\Http\Controllers;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\ValidateAdmin;
use App\Http\Middleware\ValidateLogin;
use App\Http\Middleware\ValidateMember;
use App\Http\Middleware\ValidateSeller;
use App\Models\Product;
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
Route::get('/', [ProductController::class, 'index']);
Route::get('/home', [ProductController::class, 'index'])->name('home');
Route::get('/login', \App\Http\Controllers\Auth\LoginController::class)->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.authenticate');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'create'])->name('register.create')->middleware(ValidateLogin::class);
Route::post('/register', [UserController::class, 'store'])->name('register.store')->middleware(ValidateLogin::class);

Route::middleware([Authenticate::class, 'can:isAdmin'])->prefix('vouchers')->name('vouchers.')->group(function(){
    Route::get('/', [VoucherController::class,'index'])->name('index');
    Route::get('/create', [VoucherController::class, 'create'])->name('create');
    Route::post('/store', [VoucherController::class, 'store'])->name('store');
});

Route::middleware([Authenticate::class])->prefix('requests')->name('requests.')->group(function(){
    Route::get('/',[RequestController::class,'index'])->name('index');
    Route::get('/create', [RequestController::class,'create'])->name('create')->middleware('can:create-request');
    Route::post('/store', [RequestController::class,'store'])->name('store')->middleware('can:create-request');
    Route::put('/edit',[RequestController::class,'update'])->name('update')->middleware('can:isAdmin');
});



Route::get('storage/{type}/{filename}', function ($type, $filename)
{
    if($type == 'users') $path = storage_path('app/users/'.$filename);
    else $path = storage_path('app/products/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);


    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('image');

Route::middleware([Authenticate::class,ValidateSeller::class])->prefix('products')->name('products.')->group(function(){
    Route::get('/create',[ProductController::class, 'create'])->name('create');
    Route::post('/store',[ProductController::class, 'store'])->name('store');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit')->middleware('can:manage-product,product');
    Route::put('/update/{product}', [ProductController::class, 'update'])->name('update')->middleware('can:manage-product,product');
    Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy')->middleware('can:manage-product,product');
    Route::get('/manage', [ProductController::class, 'manage'])->name('manage');
    Route::get('/view', [ProductController::class, 'view'])->name('view');
    Route::get('/show/{product}', [ProductController::class,'show'])->name('show')->withoutMiddleware([ValidateSeller::class, Authenticate::class]);
});

Route::middleware([Authenticate::class])->prefix('reviews')->name('reviews.')->group(function(){
    Route::get('/create/{transaction}', [ReviewController::class, 'create'])->name('create')->middleware('can:create-review,transaction');
    Route::post('/store/{transaction}', [ReviewController::class, 'store'])->name('store')->middleware('can:create-review,transaction');
    Route::get('/edit/{review}', [ReviewController::class, 'edit'])->name('edit')->middleware('can:update-review,review');
    Route::put('/edit/{review}', [ReviewController::class, 'update'])->name('update')->middleware('can:update-review,review');;
});

Route::middleware([Authenticate::class, ValidateMember::class])->prefix('transactions')->name('transactions.')->group(function(){
    Route::get('/{type}',[TransactionController::class, 'index'])->name('index');
    Route::post('/store/{cart}', [TransactionController::class, 'store'])->name('store');
});

Route::middleware([Authenticate::class, ValidateMember::class])->prefix('carts')->name('carts.')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/{product}', [CartController::class, 'store'])->name('store')->middleware('can:create-cart,product');
    Route::get('/{cart}', [CartController::class, 'show'])->name('show')->middleware('can:view-cart,cart');
    Route::delete('/{cart}/{product}', [CartController::class, 'destroy'])->name('destroy')->middleware('can:view-cart,cart');
});


