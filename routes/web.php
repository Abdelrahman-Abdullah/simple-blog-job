<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/adding-post',[PostController::class, 'create'])->name('post.create');
    Route::post('/adding-post',[PostController::class, 'store'])->name('post.store');
    Route::get('/posts', [PostController::class, 'index'])->name('dashboard');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/posts/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::controller(CommentController::class)->group(function () {
        Route::get('/posts/{post}/comments/add','create')->name('comment.create');
        Route::post('/posts/{post}/comments','store')->name('comment.store');
        Route::delete('/comments/{comment}/delete','delete')->name('comment.delete');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
