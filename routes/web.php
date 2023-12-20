<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [ArticleController::class, 'homepage'])->name('homepage')->withoutMiddleware('auth');
    Route::get('/home', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/article.new', [ArticleController::class, 'new'])->name('article.new');
    Route::get('/article.show/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::post('/article.store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article.delete/{article}', [ArticleController::class, 'delete'])->name('article.delete');
    Route::get('/article.edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/article.update/{article}', [ArticleController::class, 'update'])->name('article.update');
});


Route::middleware('guest')->group(function () {

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'handleLogin'])->name('login');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'handleRegister'])->name('register');
});


