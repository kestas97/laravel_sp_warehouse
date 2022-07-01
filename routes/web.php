<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'landingpage'])->name('homepage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(\App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('/category/create', 'create')->name('category.create');
    Route::post('/category/store', 'store')->name('category.store');
    Route::get('/categories/list', 'index')->name('categories.list');
    Route::get('/category/{categoryId}/edit', 'edit')->name('category.edit');
    Route::put('/category/{categoryId}', 'update')->name('category.update');
    Route::delete('/category/{categoryId}', 'destroy')->name('category.delete');
});

Route::controller(\App\Http\Controllers\FlavorController::class)->group(function () {
    Route::get('/flavor/create', 'create')->name('flavor.create');
    Route::post('/flavor/store', 'store')->name('flavor.store');
    Route::get('/flavors/list', 'index')->name('flavors.list');
    Route::get('/flavor/edit/{flavorsId}', 'edit')->name('flavor.edit');
    Route::put('/flavor/{flavorId}', 'update')->name('flavor.update');
    Route::delete('/flavor/{flavorId}', 'destroy')->name('flavor.delete');
});

Route::controller(\App\Http\Controllers\ManufacturerController::class)->group(function () {
    Route::get('/manufacturer/create', 'create')->name('manufacturer.create');
    Route::post('/manufacturer/store', 'store')->name('manufacturer.store');
    Route::get('/manufacturers/list', 'index')->name('manufacturer.list');
    Route::get('/manufacturer/edit/{manufacturerId}', 'edit')->name('manufacturer.edit');
    Route::put('/manufacturer/{manufacturerId}', 'update')->name('manufacturer.update');
    Route::delete('/manufacturer/{manufacturerId}', 'destroy')->name('manufacturer.delete');
});

Route::controller(\App\Http\Controllers\ProductLocationController::class)->group(function () {
    Route::get('/product/location/create', 'create')->name('prod-location.create');
    Route::post('/product/location/store', 'store')->name('prod-location.store');
    Route::get('/products/locations/list', 'index')->name('prod-location.list');
    Route::get('/product/location/edit/{prodLocationId}', 'edit')->name('prod-location.edit');
    Route::put('/product/location/{prodLocationId}', 'update')->name('prod-location.update');
    Route::delete('/product/location/{prodLocationId}', 'destroy')->name('prod-location.delete');

});

Route::resource('/product', 'App\Http\Controllers\ProductController');

Route::controller(\App\Http\Controllers\QrController::class)->group(function () {
    Route::get('/qrcode/{id}', 'generateQr')->name('generate');
    Route::get('/download/qr/{id}', 'downloadQr')->name('qrcode.download');
});

Route::controller(\App\Http\Controllers\SearchController::class)->group(function () {
    Route::get('/search', 'search')->name('search');
    Route::get('/search-result', 'find')->name('find');
});

Route::controller(\App\Http\Controllers\ImportController::class)->group(function () {
    Route::get('/products/import/create', 'createImport')->name('product-import.create');
    Route::post('/products/import', 'store')->name('product.import');
});
Route::controller(\App\Http\Controllers\AdminController::class)->group(function () {
    Route::get('/users-list', 'index')->name('users.list');
    Route::post('/activate-user/{userId}', 'activateUser')->name('user.activate');
    Route::post('/deactivate-user/{userId}', 'deactivateUser')->name('user.deactivate');
    Route::delete('/delete-user/{userId}', 'destroy')->name('destroy.user');
});




