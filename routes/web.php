<?php

use App\Http\Controllers\CommentPostController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterSubscriptionsController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagPostController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::view('/dashboard', 'dashboard')->middleware(['auth'])->name('dashboard');

Route::resource('/profile', ProfileController::class)->parameters(['profile' => 'user']);

Route::post('follow', [FollowsController::class, 'store'])->name('follows.store');

Route::delete('follow', [FollowsController::class, 'destroy'])->name('follows.destroy');

Route::post('posts/{post}/like', [PostLikeController::class, 'store'])->name('likes.store');

Route::delete('posts/{post}/like', [PostLikeController::class, 'destroy'])->name('likes.destroy');

Route::resource('/posts', PostController::class);

Route::resource('/support', SupportController::class)->only(['create', 'store', 'show']);

Route::resource('posts.comments', CommentPostController::class)->except(['index', 'show']);

Route::post('subscriptions', [NewsletterSubscriptionsController::class, 'store'])->name('subscriptions.store');

Route::get('/subscriptions', [SubscriptionsController::class, 'index'])->name('subscriptions.index');

Route::get('/tags/{tag}/posts', [TagPostController::class, 'index'])->name('tags.posts');

Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');
