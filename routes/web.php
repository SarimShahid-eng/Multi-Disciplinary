<?php

use App\Models\Submissions;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Context;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VolumeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewersController;
use App\Http\Controllers\ManuscriptController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\tabPaneValidationController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('user/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'authorRestrict'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::prefix('user-dashboard')->middleware(['authorRestrict'])->group(function () {
    Route::prefix('user-dashboard')->group(function () {
        // Route::controller(ManuscriptController::class)->name('manuscript.')->group(function () {
        //     Route::prefix('manuscript')->group(function () {});
        //     // Route::get('manage-account', 'manage_account')->name('manage_account');
        // });
        Route::middleware('role:reviewer')->group(function () {
            Route::controller(ReviewersController::class)->prefix('reviewers')->name('reviewers.')->group(function () {
                Route::get('reviewers-account', 'manage_account')->name('manage_account');
            });
        });
    });
    Route::middleware('role:author')->group(function () {
        Route::prefix('submission')->name('submission.')->group(function () {
            Route::controller(SubmissionController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('submission-details', 'create')->name('create');
                Route::post('store', 'store')->name('store');
            });
            Route::controller(tabPaneValidationController::class)->group(function () {
                Route::post('manuscriptValidation', 'manuscriptValidation')->name('manuscript.validation');
                Route::post('validation', 'authorValidation')->name('author.validation');
                Route::post('reviewer-validation', 'reviewerValidation')->name('reviewer.validation');
                Route::post('statemenInformation-validation', 'statemenInformation')->name('statemenInformation.validation');
            });
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('view-profile', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('update-profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
