<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ShowBookPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ShowBookPageController::class, 'index'])->name('client.page.home');

Route::get('/detail/{id}', [ShowBookPageController::class, 'detail'])->name('client.page.detail');

Route::prefix('bookpage')->group(function () {
    Route::get('/{id}', [ShowBookPageController::class, 'selBookByCate'])->name('client.page.bookbycate');
});


Route::prefix('account')->group(function () {
    Route::get('/login', function () {
        return view('client.page.account.login');
    })->name('client.account.login');

    Route::get('/register', function () {
        return view('client.page.account.register');
    })->name('client.account.register');

    Route::get('/forgotpassword', function () {
        return view('client.page.account.forgotPassword');
    })->name('client.account.forgotpassword');
});


// ADMIN
Route::prefix('admin')->group(function () {
    // trang chủ admin
    Route::get('/', function () {
        return view('admin.page.dashboard');
    })->name('admin.index');


    // category
    Route::get('/category/create', [CategoryController::class, 'index'])->name('admin.category.insert');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category', [CategoryController::class, 'listCategory'])->name('admin.category.list');
    Route::delete('/category/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.category.delete');
    Route::get('/category/update/{id}', [CategoryController::class, 'updateView'])->name('admin.category.updateview');
    Route::put('/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('admin.category.update');


    // book
    Route::get('/book', [BookController::class, 'index'])->name('admin.book.list');
    Route::get('/book/create', [BookController::class, 'create'])->name('admin.book.insert');
    Route::post('/book/create', [BookController::class, 'store'])->name('admin.book.store');
    Route::delete('/book/{id}', [BookController::class, 'deleteBook'])->name('admin.book.delete');
    Route::get('/book/update/{id}', [BookController::class, 'updateView'])->name('admin.book.updateview');
    Route::put('/book/update/{id}', [BookController::class, 'updateBook'])->name('admin.book.update');
});



