<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewersController;
use App\Http\Controllers\User\Editor\DecisionsController;
use App\Http\Controllers\User\Submissions\SubmissionController;
use App\Http\Controllers\User\Submissions\tabPaneValidationController;
use App\Http\Controllers\User\Submissions\SubmittedManuscriptController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('user/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'authorRestrict'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('user-dashboard')->group(function () {

        Route::middleware('role:reviewer')->group(function () {
            Route::controller(ReviewersController::class)->prefix('reviewers')->name('reviewers.')->group(function () {
                Route::get('reviewers-account', 'manage_account')->name('manage_account');
            });
        });
    });
    Route::middleware('role:author')->group(function () {
        Route::prefix('submission')->name('submission.')->group(function () {
            Route::controller(SubmissionController::class)->group(function () {
                Route::get('submit-research', 'reset_manuscript')->name('reset_manuscript');
                Route::middleware('check.manuscript_step')->group(function () {
                    Route::get('create-manuscript/{manuscriptId}/1', 'create_manuscript')->name('create_manuscript');
                    Route::get('create-author/{manuscriptId}/2', 'create_author')->name('create_author');
                    Route::get('create-reviewer/{manuscriptId}/3', 'create_reviewer')->name('create_reviewer');
                    Route::get('create-statement/{manuscriptId}/4', 'create_statement')->name('create_statement');
                    Route::post('store', 'store')->name('store');
                });
            });

            Route::controller(tabPaneValidationController::class)->group(function () {
                Route::post('manuscriptValidation', 'manuscriptValidation')->name('manuscript.validation');
                Route::post('validation', 'authorValidation')->name('author.validation');
                Route::post('reviewer-validation', 'reviewerValidation')->name('reviewer.validation');
                Route::post('statemenInformation-validation', 'statementValidation')->name('statement.validation');
            });
        });
        Route::controller(SubmittedManuscriptController::class)->name('submitted_manuscripts.')->group(function () {
            Route::get('incomplete-submissions', 'incomplete_manuscripts')->name('incomplete_manuscripts');
            Route::get('under-processing-submissions', 'under_processing_manuscripts')->name('under_processing_manuscripts');
            Route::get('website-online-submissions', 'website_online_manuscripts')->name('website_online_manuscripts');
            Route::get('rejected-withdrawn-archived-submissions', 'reject_withdrawn_manuscripts')->name('reject_withdrawn_manuscripts');
            Route::get('incomplete-submissions', 'incomplete_manuscripts')->name('incomplete_manuscripts');
            Route::post('delete-incomplete-manuscripts', 'delete_incomplete')->name('delete_incomplete');
        });
    });
        Route::middleware('role:editor-in-chief,associate-editor,assistant-editor,author')->group(function () {
            Route::controller(SubmittedManuscriptController::class)->name('mansucript_details.')->group(function () {
                Route::get('review_info/{manuscriptId}', 'view_manuscript_details')->name('view');
            });
        });



    Route::middleware('role:editor-in-chief,associate-editor')->group(function () {
        Route::controller(DecisionsController::class)->name('decision.')->group(function () {
            Route::get('editor-decision', 'editor_decision')->name('editor_decision');
            Route::get('reject-manuscript/{manuscript}', 'reject_manuscript')->name('reject_manuscript');
            Route::get('accept-manuscript/{manuscript}', 'accept_manuscript')->name('accept_manuscript');
            Route::get('under-review-manuscript/{manuscript}', 'under_review_manuscript')->name('under_review_manuscript');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('view-profile', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('update-profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
