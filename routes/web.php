<?php

use App\Http\Controllers\BookController;
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




Route::get('/', [BookController::class,'index'])->name('home_page');
Route::get('/add_book', [BookController::class,'create'])->name('add_book');
Route::post('/store', [BookController::class,'store'])->name('store');
Route::get('/download/{file_name}', [BookController::class,'download_book'])->name('download');
Route::get('/search', [BookController::class,'search']);
