<?php

use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Oauth\GitHubController;
use App\Http\Controllers\Admin\GeoIpController;
use App\Http\Controllers\Admin\AgentIpController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\PageController;
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
Route::get('/geo', [GeoIpController::class, 'index']);
Route::get('/agents', [AgentIpController::class, 'index']);
Route::get('/oauth/github/callback', GitHubController::class)->name('oauth.github.callback');


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
    Route::prefix('admin')->group(function () {
        Route::get('/panel', [AdminPanelController::class, 'index'])->name('admin.panel');

        //Админка на посты
        Route::prefix('post')->group(function () {
            Route::get('/', [AdminPostController::class, 'index'])->name('admin.post');
            Route::get('/trash', [AdminPostController::class, 'trash'])->name('admin.post.trash');
            Route::get('/create', [AdminPostController::class, 'create'])->name('admin.post.create');
            Route::get('/{id}', [AdminPostController::class, 'show'])->name('admin.post.show');
            Route::post('/store', [AdminPostController::class, 'store'])->name('admin.post.store');
            Route::get('/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.post.edit');
            Route::post('/update', [AdminPostController::class, 'update'])->name('admin.post.update');
            Route::get('/{id}/destroy', [AdminPostController::class, 'destroy'])->name('admin.post.destroy');
            Route::get('/restore/{id}', [AdminPostController::class, 'restore'])->name('admin.post.restore');
            Route::get('/forceDelete/{id}', [AdminPostController::class, 'forceDelete'])->name('admin.post.forceDelete');
        });
        //Админка на категории
        Route::prefix('category')->group(function () {
            Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.category');
            Route::get('/trash', [AdminCategoryController::class, 'trash'])->name('admin.category.trash');
            Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
            Route::get('/{id}', [AdminCategoryController::class, 'show'])->name('admin.category.show');
            Route::post('/store', [AdminCategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
            Route::post('/update', [AdminCategoryController::class, 'update'])->name('admin.category.update');
            Route::get('/{id}/destroy', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');
            Route::get('/restore/{id}', [AdminCategoryController::class, 'restore'])->name('admin.category.restore');
            Route::get('/forceDelete/{id}', [AdminCategoryController::class, 'forceDelete'])->name('admin.category.forceDelete');
        });
        //Админка на Теги
        Route::prefix('tag')->group(function () {
            Route::get('/', [AdminTagController::class, 'index'])->name('admin.tag');
            Route::get('/trash', [AdminTagController::class, 'trash'])->name('admin.tag.trash');
            Route::get('/create', [AdminTagController::class, 'create'])->name('admin.tag.create');
            Route::get('/{id}', [AdminTagController::class, 'show'])->name('admin.tag.show');
            Route::post('/store', [AdminTagController::class, 'store'])->name('admin.tag.store');
            Route::get('/{id}/edit', [AdminTagController::class, 'edit'])->name('admin.tag.edit');
            Route::post('/update', [AdminTagController::class, 'update'])->name('admin.tag.update');
            Route::get('/aid}/destroy', [AdminTagController::class, 'destroy'])->name('admin.tag.destroy');
            Route::get('/restore/{id}', [AdminTagController::class, 'restore'])->name('admin.tag.restore');
            Route::get('/forceDelete/{id}', [AdminTagController::class, 'forceDelete'])->name('admin.tag.forceDelete');
        });
    });

});


//Добавляем комемнты по уроку + group + prefix
Route::prefix('/page')->group(function () {
    Route::get('/post', [PageController::class, 'index'])->name('page');
    Route::get('/{id}', [PageController::class, 'show'])->name('page.show');
    Route::post('/comment/{id}', [PageController::class, 'addComment'])->name('page.add.comment');
});
