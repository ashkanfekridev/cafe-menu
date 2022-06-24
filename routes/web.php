<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

// Authentication
Auth::routes();
//Developer
Route::get('/clear', function () {
    return \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

Route::get('/link', function () {
    return \Illuminate\Support\Facades\Artisan::call('storage:link');
});


// Site
Route::get('/', [\App\Http\Controllers\SiteController::class, 'home'])->name('home');

// Dashboard
Route::group([
    'as' => "dashboard.",
    'prefix' => 'dashboard',
    'middleware' => ['auth', 'web']
], function () {

    Route::get('/reset', [\App\Http\Controllers\Dashboard\HomeController::class, 'reset'])->name('reset');
    Route::post('reset-password', [\App\Http\Controllers\Dashboard\HomeController::class, 'resetPassword'])->name('reset-password');

    Route::get('/edit', [\App\Http\Controllers\Dashboard\HomeController::class, 'edit'])->name('edit');
    Route::post('edit-user-options', [\App\Http\Controllers\Dashboard\HomeController::class, 'updateUserOptions'])->name('updateUserOptions');

});

//Admin
Route::group([
    "as" => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['auth', 'web']
], function () {
    Route::get('/', \App\Http\Controllers\Admin\HomeController::class)->name('home');
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
});

