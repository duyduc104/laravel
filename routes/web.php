<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::prefix('product')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('product.index');
        Route::get('/detail/{id?}', 'detail')->name('product.detail');
        Route::get('/add', 'add')->name('product.add');
        Route::post('/store', 'store')->name('product.store');
    });
    // Route::get('/', [ProductController::class, 'index'])->name('product.index');
    // Route::get('/detail/{id?}', [ProductController::class, 'detail'])->name('product.detail');
//     Route::get('/add', function () {
//         return view('product.add');
//     })->name('product.add');
//     Route::get('/id/{id?}', function ($id = '123') {

//         return "Chi tiết sản phẩm có ID = $id";
//     })->where('id', '[A-Za-z0-9]+');
});
Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login')->name('auth.login');
        Route::post('/register', 'register')->name('auth.register');
    });
});
Route::get(('/sinhvien/{name?}/{mssv?}'), function ($name = 'Luong Xuan Hieu', $mssv = '123456') {
    return "
        <h1>Thông tin sinh viên</h1>
        <p>Họ và tên: " . $name . "</p>
        <p>MSSV: " . $mssv . "</p>
    ";
});
Route::get('/chessboard/{n?}', function ($n) {
    return view('chessBoard', compact('n'));
});
Route::fallback(function () {
    return response()->view('error.404', [], 404);
});