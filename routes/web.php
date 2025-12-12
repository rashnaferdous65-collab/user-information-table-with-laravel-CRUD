<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    return view('welcome', ['posts'=> Post::paginate(5)]);
})->name('home');

Route::get('/create', [PostController::class, 'create']);
Route::post('/store', [PostController::class, 'ourfilestore'])->name('store');

Route::put('/edit/{id}', [PostController::class, 'editData'])->name('edit');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');

Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('post.delete');
