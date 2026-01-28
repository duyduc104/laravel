<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\testController;
use App\Http\Middleware\checkTimeAccess;
use App\Http\Middleware\checkAge;
use App\Http\Controllers\AgeController;

Route::get('/', function () {

    return view('welcome');
})->name('welcome');
// 1. Nhóm KHÔNG CẦN check tuổi (Trang chủ, Login, Register)
Route::get('/age', [AgeController::class, 'age'])->name('age');
Route::post('/age', [AgeController::class, 'checkAge'])->name('age.check');
Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/signIn', 'signIn')->name('signIn');
        Route::post('/signIn', 'checkSignIn')->name('check.signIn');
        Route::post('/register', 'register')->name('auth.register');
    });
});

// 2. Nhóm BẮT BUỘC check tuổi và thời gian
Route::middleware([checkTimeAccess::class, checkAge::class])->group(function () {
    Route::prefix('product')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('product.index');
            Route::get('/detail/{id?}', 'detail')->name('product.detail');
            Route::get('/add', 'add')->name('product.add');
            Route::post('/store', 'store')->name('product.store');
        });
    });
});
Route::get('/logout', function () {
    session()->forget(['age']); 
    return redirect()->route('signIn');   
})->name('logout');

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
Route::resource('tests', testController::class);

