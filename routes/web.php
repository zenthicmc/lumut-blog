<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\HomeController;
use App\Models\Post;
use App\Models\Account;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/post/{id}', [HomeController::class, 'show'])->name('home.show');

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('login', [AuthController::class, 'postLogin'])->name('auth.login.store');
    Route::post('register', [AuthController::class, 'postRegister'])->name('auth.register.store');
});

Route::prefix('dashboard')->middleware(AuthMiddleware::class)->group(function () {
    Route::get('/', function () {
        return view('dashboard.index', [
            'totalPosts' => Post::count(),
            'totalAccounts' => Account::count()
        ]);
    })->name('dashboard.index');

    Route::resource('account', AccountController::class);
    Route::resource('post', PostController::class);
});
