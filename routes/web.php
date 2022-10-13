<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\News\NewsController as N;
use App\Http\Controllers\News\Comments\CommentController as C;

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


// News

Route::prefix('news')->name('news-')->group(function () {
    Route::get('', [N::class, 'index'])->name('index');
    Route::get('create', [N::class, 'create'])->name('create');
    Route::post('', [N::class, 'store'])->name('store');
    Route::get('edit/{news}', [N::class, 'edit'])->name('edit');
    Route::put('{news}', [N::class, 'update'])->name('update');
    Route::delete('{news}', [N::class, 'destroy'])->name('delete');
    Route::get('show/{id}', [N::class, 'show'])->name('show');  

    Route::prefix('show/{id}/comments')->name('comments-')->group(function () {
        Route::post('', [C::class, 'store'])->name('store');
    });
});

// Comments



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
