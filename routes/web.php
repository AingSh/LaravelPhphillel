<?php

use App\Http\Controllers\Admin\AdminPostController;
use \App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderByUserController;
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


//main storage /
Route::get('/', [HomeController::class, 'index'])->name('main');


//Юзер  роут , за автора  уже въехал +-
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/order/{id}', OrderByUserController::class)->name('user.by.order');

//author
Route::get('/author/{id}', [UserController::class, 'posts'])->name('user.posts');
Route::get('/author/{id}/category/{category_id}', [UserController::class, 'categories'])->name('user.categories');
Route::get('/author/{id}/category/{category_id}/tag/{tag_id}', [UserController::class, 'categoryTags'])->name('user.categoryTags');


//login
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login')
    ->middleware('guest');
Route::post('/auth/login', [AuthController::class, 'handleLogin'])->name('auth.handle.login');


//Категории , все
Route::get('/category/{category}', [CategoryController::class, 'categories']);

//tags , все
Route::get('/tag/{tag}', [TagController::class, 'posts']);




Route::middleware(['auth'])->group(function () {

    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/admin/panel', [AdminPanelController::class, 'index'])->name('admin.panel');

    //Админка на посты
    Route::get('/admin/post', [AdminPostController::class, 'index'])->name('admin.post');
    Route::get('/admin/post/trash', [AdminPostController::class, 'trash'])->name('admin.post.trash');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin.post.create');
    Route::get('/admin/post/{id}', [AdminPostController::class, 'show'])->name('admin.post.show');
    Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin.post.store');
    Route::get('/admin/post/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.post.edit');
    Route::post('/admin/post/update', [AdminPostController::class, 'update'])->name('admin.post.update');
    Route::get('/admin/post/{id}/destroy', [AdminPostController::class, 'destroy'])->name('admin.post.destroy');
    Route::get('/admin/post/restore/{id}', [AdminPostController::class, 'restore'])->name('admin.post.restore');
    Route::get('/admin/post/forceDelete/{id}', [AdminPostController::class, 'forceDelete'])->name('admin.post.forceDelete');

    //Админка на категории
    Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/category/trash', [AdminCategoryController::class, 'trash'])->name('admin.category.trash');
    Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/admin/category/{id}', [AdminCategoryController::class, 'show'])->name('admin.category.show');
    Route::post('/admin/category/store', [AdminCategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/update', [AdminCategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/{id}/destroy', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('/admin/category/restore/{id}', [AdminCategoryController::class, 'restore'])->name('admin.category.restore');
    Route::get('/admin/category/forceDelete/{id}', [AdminCategoryController::class, 'forceDelete'])->name('admin.category.forceDelete');
    //Админка на Теги
    Route::get('/admin/tag', [AdminTagController::class, 'index'])->name('admin.tag');
    Route::get('/admin/tag/trash', [AdminTagController::class, 'trash'])->name('admin.tag.trash');
    Route::get('/admin/tag/create', [AdminTagController::class, 'create'])->name('admin.tag.create');
    Route::get('/admin/tag/{id}', [AdminTagController::class, 'show'])->name('admin.tag.show');
    Route::post('/admin/tag/store', [AdminTagController::class, 'store'])->name('admin.tag.store');
    Route::get('/admin/tag/{id}/edit', [AdminTagController::class, 'edit'])->name('admin.tag.edit');
    Route::post('/admin/tag/update', [AdminTagController::class, 'update'])->name('admin.tag.update');
    Route::get('/admin/tag/{id}/destroy', [AdminTagController::class, 'destroy'])->name('admin.tag.destroy');
    Route::get('/admin/tag/restore/{id}', [AdminTagController::class, 'restore'])->name('admin.tag.restore');
    Route::get('/admin/tag/forceDelete/{id}', [AdminTagController::class, 'forceDelete'])->name('admin.tag.forceDelete');

});



