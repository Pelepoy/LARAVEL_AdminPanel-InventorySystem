<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

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


Route::redirect('/', '/products', 301);

/* 
 * @Admin Routes
 */
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'authentication')->name('user.authentication');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


/* 
 * @Product Routes [Middleware: auth]
 */
Route::middleware('auth')->group(function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('update/{id}', 'update')->name('products.update');
        Route::delete('delete/{id}', 'destroy')->name('products.delete');
        Route::get('search', 'search')->name('products.search');
    });

    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('admin', [AuthController::class, 'admin'])->name('admin');
});
