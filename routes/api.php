<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user/register', RegisterController::class)->name('register');


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/adding-post',[PostController::class, 'store'])->name('post.store');
    Route::get('/posts', [PostController::class, 'index'])->name('dashboard');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
    Route::patch('/posts/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::controller(CommentController::class)->group(function () {
        Route::post('/posts/{post}/comments','store')->name('comment.store');
        Route::delete('/comments/{comment}/delete','delete')->name('comment.delete');
    });
});
