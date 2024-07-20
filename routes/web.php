<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class, 'index'])->name('client.page.home');


Route::get('/detail/{id}', [BookController::class,'detail'])->name('client.page.detail');


Route::prefix('bookpage')->group(function (){
   Route::get('/{id}', [BookController::class, 'selBookByCate'])->name('client.page.bookbycate');
});


Route::prefix('account')->group(function (){
    Route::get('/login', function (){
        return view('client.page.account.login');
    })->name('client.account.login');

    Route::get('/register', function (){
        return view('client.page.account.register');
    })->name('client.account.register');

    Route::get('/forgotpassword', function (){
        return view('client.page.account.forgotPassword');
    })->name('client.account.forgotpassword');
});




// ADMIN
Route::prefix('admin')->group(function (){
    Route::get('/', function (){
        return view('admin.page.dashboard');
    })->name('admin.index');
    Route::get('/category', function (){
        return view('admin.category.create');
    })->name('admin.category.create');
});



