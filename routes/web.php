<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ProductController::class)->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', 'index')->name('products.index');
        Route::post('/', 'store')->name('products.store');
        Route::get('/create', 'create')->name('products.create');
        Route::get('/search', 'search')->name('products.search');
        Route::get('/{id}', 'show')->name('products.show');
        Route::get('/edit/{id}', 'edit')->name('products.edit');
        Route::post('/{id}', 'update')->name('products.update');
        Route::get('/delete/{id}', 'destroy')->name('products.destroy');
    });
});
