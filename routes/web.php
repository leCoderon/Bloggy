<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReplyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\CommentReply;
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

    // Articles route
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/article.new', [ArticleController::class, 'new'])->name('article.new');
    Route::get('/article.show/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::post('/article.store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article.delete/{article}', [ArticleController::class, 'delete'])->name('article.delete');
    Route::get('/article.edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/article.update/{article}', [ArticleController::class, 'update'])->name('article.update');
    // Les likes
    Route::post('/article/{article}/like', [ArticleController::class, 'like'])->name('article.like');

    // Importer les images via le tynimce
    Route::post('/upload', [ImageUploadController::class, 'upload']);

    // Profile
    Route::put('/avatar-update', [AvatarController::class, 'update'])->name('avatar-update');
    Route::get('/avatar-delete', [AvatarController::class, 'deleteAvatar'])->name('avatar-delete');
    Route::get('/profil', [ProfileController::class, 'profil'])->name('profil');
    Route::put('/update-name', [ProfileController::class, 'updateName'])->name('update-name');

    // comments'        
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}/delete', [CommentController::class, 'delete'])->name('comments.delete');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

    //Replies to comments
    Route::post('/comment-replies', [CommentReplyController::class, 'store'])->name('comment-replies.store');
    Route::delete('/comment-replies/{reply}/delete', [CommentReplyController::class, 'delete'])->name('comment-replies.delete');
    Route::put('/comment-replies/{reply}', [CommentReplyController::class, 'update'])->name('comment-replies.update');

});


Route::middleware('guest')->group(function () {

    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'handleLogin'])->name('login');

    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'handleRegister'])->name('register');
});


Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'handleContact'])->name('handleContact');


// Route::get('/message', [MessageController::class, 'message'])->name('message');
// Route::post('/message', [MessageController::class, 'handleMessage'])->name('handleMessage');



