<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/enums', [BookController::class, 'enums'])->name('enums');

Route::prefix('books')->name('books.')->group(function(){
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/{book}', [BookController::class, 'edit'])->name('edit');

    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::post('/{book}', [BookController::class, 'update'])->name('update');

    Route::delete('/{book}', [BookController::class, 'destroy'])->name('destroy');
});