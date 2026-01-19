<?php

use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::prefix('product')->group(function () {
    Route::get('/', function () {
        $products = [
            ['id' => 1, 'name' => 'iPhone 15', 'price' => 25000000],
            ['id' => 2, 'name' => 'Samsung S24', 'price' => 22000000],
        ];
        return view(('product.index'), compact('products'));
    })->name('product.index');
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');
    Route::get('/id/{id?}', function ($id = '123') {
        return "Chi tiết sản phẩm có ID = $id";
    })->where('id', '[A-Za-z0-9]+');
});
Route::get(('/sinhvien/{name?}/{mssv?}'), function ($name = 'Luong Xuan Hieu', $mssv = '123456') {
    return "
        <h1>Thông tin sinh viên</h1>
        <p>Họ và tên: " . $name . "</p>
        <p>MSSV: " . $mssv . "</p>
    ";
});
Route::get('/chessboard/{n?}', function ($n) {
    return view('chessboard', compact('n'));
});
Route::fallback(function () {
    return response()->view('error.404', [], 404);
});