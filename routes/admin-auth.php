<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VolumeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\AdminAuth\AdminAuthenticatedSessionController;
use App\Http\Controllers\ArticleTypeController;

Route::name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::post('loginAuth', [AdminAuthenticatedSessionController::class, 'store'])->name('loginAuth');
        Route::get('login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
    });
    Route::get('logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::name('admin.')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('dashboard');
            Route::get('manage-admin', 'index')->name('index');
            Route::get('add-admin', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit-admin/{admin}', 'edit')->name('edit');
            Route::get('delete-admin/{admin}', 'destroy')->name('destroy');
        });
        Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
            Route::get('manage-users', 'manage_user')->name('index');
            Route::get('add-user', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit-user/{user}', 'edit')->name('edit');
        });

        Route::controller(JournalController::class)->prefix('journal')->name('journal.')->group(function () {
            Route::get('manage-journal', 'index')->name('index');
            Route::get('add-journal', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit-journal/{journal}', 'edit')->name('edit');
        });
        Route::controller(VolumeController::class)->prefix('volume')->name('volume.')->group(function () {
            Route::get('manage-volume', 'index')->name('index');
            Route::get('add-volume', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit-volume/{volume}', 'edit')->name('edit');
        });
        Route::controller(ArticleTypeController::class)->prefix('article_type')->name('article_type.')->group(function () {
            Route::get('manage-article-type', 'index')->name('index');
            Route::post('store-article-type', 'store')->name('store');
            Route::get('edit-article-type/{article}', 'edit')->name('edit');
        });
    });
});
