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

// add product route
Route::get('/add-product', [ProductController::class, 'addProduct']);

// create product
Route::post('/create-product', [ProductController::class, 'createProduct'])->name('product.create');

// read product
Route::get('/products', [ProductController::class, 'getProduct']);
Route::get('/products/{id}', [ProductController::class, 'getProductById']);

// edit product
Route::get('/edit-product/{id}', [ProductController::class, 'editProduct']);

// delete product
Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct']);

// update
Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('product.update');

// search
Route::get('/search', [ProductController::class, 'search'])->name('product.search');