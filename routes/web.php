<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\TagController;

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


//main storage /
Route::get('/', [HomeController::class, 'index']);


//Юзер  роут , вообще за автора не въехал +-
Route::get('/user', [UserController::class, 'index']);
Route::get('/author/{id}', [UserController::class, 'posts'])->name('user.posts');
Route::get('/author/{id}/category/{category_id}', [UserController::class, 'categories'])->name('user.categories');
Route::get('/author/{id}/category/{category_id}/tag/{tag_id}', [UserController::class, 'tags'])->name('user.tags');



//Категории , все
Route::get('/category/{category}', [CategoryController::class, 'categories']);

//tags , все
Route::get('/tag/{tag}', [TagController::class, 'posts']);

//Админка
Route::get('/admin/post', [AdminPostController::class, 'index'])->name('admin.post');
Route::get('/admin/create', [AdminPostController::class, 'create'])->name('admin.post.create');
Route::post('/admin/store', [AdminPostController::class, 'store'])->name('admin.post.create');
Route::get('/admin/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.post.edit');
Route::get('/admin/update', [AdminPostController::class, 'update'])->name('admin.post.update');
Route::get('/admin/{id}/destroy', [AdminPostController::class, 'destroy'])->name('admin.post.destroy');


