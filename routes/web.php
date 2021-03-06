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

Route::get('/', [\App\Http\Controllers\AuthorController::class, 'publicIndex'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('books', \App\Http\Controllers\BookController::class);
    Route::resource('authors', \App\Http\Controllers\AuthorController::class);
});

require __DIR__.'/auth.php';
