<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/posts', PostsController::class);

Route::get('posts/create', [PostsController::class, 'create'])->middleware(['auth'])->name('posts.create');

Route::post('posts', [PostsController::class, 'store'])->middleware(['auth'])->name('posts.store');

Route::post('/comment/{post_id}', [CommentController::class, 'store'])->middleware(['auth'])->name('comment.store');

Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->middleware(['auth'])->name('comment.delete');


require __DIR__ . '/auth.php';
