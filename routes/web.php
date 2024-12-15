<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/scraping', function () {
    return view('scraping');
})->name('scraping');

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('scraping-data', [ProductController::class, 'webScraping'])->name('scraping-data');
Route::get('product-list', [ProductController::class, 'productList'])->name('product-list');
Route::get('product-add', [ProductController::class, 'productAdd'])->name('product-add');
Route::post('store', [ProductController::class, 'store'])->name('product.store');
Route::get('analysis', [ProductController::class, 'analysisData'])->name('analysis');

Route::get('product-details/{id}', [ProductController::class, 'productDetails'])->name('product-details');