<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ShowBookPageController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;

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
    Route::get('/login', [AccountController::class, 'loginView'])->name('client.account.login-view');
    Route::post('/login', [AccountController::class, 'login'])->name('client.account.login');

    Route::get('/register', [AccountController::class, 'registerView'])->name('client.account.register-view');
    Route::post('/register', [AccountController::class, 'store'])->name('client.account.register');
    Route::get('/logout',[AccountController::class,'logout'])->name('client.account.logout');

    Route::get('/forgotpassword', [AccountController::class, 'viewReset'])->name('client.account.forgotpassword');
});


// ADMIN
Route::prefix('admin')->group(function () {
    // trang chủ admin
    Route::get('/login', [AccountController::class, 'loginViewAdmin'])->name('login-view-admin');
    Route::post('/login', [AccountController::class, 'loginAdmin'])->name('login-admin');
    Route::get('/logoutAdmin',[AccountController::class,'logoutAdmin'])->name('logoutAdmin');
    Route::get('/', [DashboardController::class, 'count'])->name('admin.index');

    Route::middleware('auth:web')->group(function (){
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



        // user
        Route::get('/user', [UserController::class, 'index'])->name('admin.user.list');
        Route::get('/user/update/{id}', [UserController::class, 'updateView'])->name('admin.user.update-view');
        Route::put('/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::put('/user/updatePass/{id}', [UserController::class, 'updatePassword'])->name('admin.user.updatePass');
        Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');

        Route::get('/user/create', [UserController::class, 'viewCreateAdmin'])->name('admin.user.create-view');
        Route::post('/user/create', [UserController::class, 'storeAdmin'])->name('admin.user.create');
    });


});



