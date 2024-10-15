<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\ArticleController as ClientArticleController;
use App\Http\Controllers\Client\LikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;

// ------------------------ CLIENT ROUTES ------------------------ //

// Trang chủ
Route::get('/', [ClientHomeController::class, 'index'])->name('client.home');

// Quản lý bài viết (Client)
Route::get('/articles', [ClientArticleController::class, 'index'])->name('client.articles.index');
Route::get('/articles/{slug}', [ClientArticleController::class, 'show'])->name('client.articles.show');

// Tìm kiếm bài viết (Client)
Route::get('/search', [ClientArticleController::class, 'search'])->name('client.articles.search');

// Quản lý tài khoản người dùng
Route::get('/profiles/{id}', [UserController::class, 'profiles'])->name('profiles');

// Đăng nhập cho client
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('client.auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('client.auth.login.post');

Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('articles.comments.store');

Route::post('/articles/{article}/like', [LikeController::class, 'like'])->name('articles.like');

// ------------------------ AUTH ROUTES ------------------------ //
Auth::routes(); // Đăng ký route cho đăng nhập, đăng ký, và quên mật khẩu


// ------------------------ ADMIN ROUTES ------------------------ //

    // Trang quản trị (Dashboard)
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Quản lý người dùng (Admin)
    Route::resource('/admin/users', UserController::class);

    // Quản lý bài viết (Admin)
    Route::resource('/admin/articles', AdminArticleController::class);

    // Quản lý chuyên mục (Admin)
    Route::resource('/admin/categories', AdminCategoryController::class);

    // Quản lý bình luận (Admin)
    Route::resource('/admin/comments', CommentController::class);

    // Quản lý thẻ tag (Admin)
    Route::resource('/admin/tags', TagController::class);