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
Auth::routes();

Route::get('/clear', function (){
    return \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

Route::get('/', [\App\Http\Controllers\SiteController::class, 'home'])->name('home');

Auth::routes();

Route::group([
    "as" => 'admin.',
    'prefix' => 'admin',
    'middleware'=>['auth', 'web']
], function () {
    Route::get('/', \App\Http\Controllers\Admin\HomeController::class)->name('home');
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
//    Route::post('store', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('image.upload');
});


