<?php

use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;

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

Auth::routes();

Route::get('profile/{username}', [ProfilesController::class, 'index'])->name('profiles.show');
Route::get('profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profiles.edit');
Route::put('profile/{user}', [ProfilesController::class, 'update'])->name('profiles.update');

Route::get('post/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('post', [PostsController::class, 'store'])->name('posts.store');
Route::get('posts/{post}/edit', [PostsController::class, 'edit'])->name(('posts.edit'));
Route::get('posts/{post}', [PostsController::class, 'show'])->name('posts.show');

Route::post('follow/{user}', [FollowsController::class, 'store'])->name('follows.store');
