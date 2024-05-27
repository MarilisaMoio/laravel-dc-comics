<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ComicController;

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

Route::get('/', [PageController::class, 'index'])->name('home');

Route::resource('comics', ComicController::class);

Route::get('bin', [ComicController::class, 'bin'])->name('comics.bin');

Route::delete('emptyBin/{comic}', [ComicController::class, 'emptyBin'])->name('comics.emptyBin');

Route::delete('emptyAllBin', 'ComicController@emptyAllBin')->name('comics.emptyAllBin');
