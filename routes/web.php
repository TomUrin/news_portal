<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController as N;

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

// Restaurants

Route::prefix('news')->name('news-')->group(function () {
    Route::get('', [N::class, 'index'])->name('index');
    Route::get('showAll', [N::class, 'showAll'])->name('showAll');
    Route::get('create', [N::class, 'create'])->name('create');
    Route::post('', [N::class, 'store'])->name('store');
    Route::get('edit/{news}', [N::class, 'edit'])->name('edit');
    Route::put('{news}', [N::class, 'update'])->name('update');
    Route::delete('{news}', [N::class, 'destroy'])->name('delete');
    Route::get('show/{id}', [N::class, 'show'])->name('show');    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
