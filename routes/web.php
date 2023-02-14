<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//frontend
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');

    // category routes
    // Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    // Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    // Route::post('category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    // Route::post('category', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);

    // category routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });


    // Brankd routes
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

    // product routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{products}', 'update');
        Route::get('/product-image/{product_image_id}/delete', 'destroyImage');
        Route::get('/products/{product_id}/delete', 'destroy');
        Route::post('product-color/{prod_color_id}', 'updateProductColorQty');
        Route::get('product-color/{prod_color_id}/delete', 'deleteProductColor');
    });

    // color routes
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color}', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');
    });


    //slider
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}', 'update');
        Route::get('/sliders/{slider_id}/delete', 'destroy');
    });
});
