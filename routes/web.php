<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get(
    '/',
    [MainController::class, 'index']
)->name('main');

// Home route, passing in auth middleware auth()->user()
Route::get(
    '/home',
    [MainController::class, 'home']
)->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Channel routes using /channels/{channel_id}
Route::get(
    '/channels/{channel_id}', [MainController::class, 'channel']
)->name('channel');

// Add post route using POST method
Route::post(
    '/add_post', [PostController::class, 'add']
)->name('add_post');

// Add route for editing a post
Route::post(
    '/editing_post', [PostController::class, 'editing']
)->name('editing_post');

// Add edit post route using POST method
Route::post(
    '/edit_post', [PostController::class, 'edit']
)->name('edit_post');

// Add delete post route using POST method
Route::post(
    '/delete_post', [PostController::class, 'delete']
)->name('delete_post');

// Add channel
Route::post(
    '/add_channel', [MainController::class, 'addChannel']
)->name('add_channel');

require __DIR__ . '/auth.php';
