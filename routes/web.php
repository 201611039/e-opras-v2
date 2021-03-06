<?php

use App\Http\Controllers\AnnualReviewController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AttributePerformanceController;
use App\Http\Controllers\ExportPDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MidYearReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OprasFormLogicController;
use App\Http\Controllers\OverallPerformanceController;
use App\Http\Controllers\PerformanceAgreementController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisedObjectiveController;
use App\Http\Controllers\RewardMeasureSanctionController;
use App\Http\Livewire\Form\AnnualReview\Index as AnnualReviewIndex;
use App\Http\Livewire\Form\AttributePerformance\Index as AttributePerformanceIndex;
use App\Http\Livewire\Form\MidYearReview\Index as MidYearReviewIndex;
use App\Http\Livewire\Form\OverallPerformance\Index as OverallPerformanceIndex;
use App\Http\Livewire\Form\PerformanceAgreement\Index as PerformanceAgreementIndex;
use App\Http\Livewire\Form\PersonalInformation\Index;
use App\Http\Livewire\Form\RevisedObjective\Index as RevisedObjectiveIndex;
use App\Http\Livewire\Form\RewardMeasure\Index as RewardMeasureIndex;
use App\Http\Livewire\Form\Submission\Index as SubmissionIndex;
use App\Http\Livewire\Review\AnnualReview;
use App\Http\Livewire\Review\AttributePerformance;
use App\Http\Livewire\Review\MidYearReview;
use App\Http\Livewire\Review\OverallPerformance;
use App\Http\Livewire\Review\PerformanceAgreement;
use App\Http\Livewire\Review\RevisedObjective;
use App\Http\Livewire\Review\RewardMeasure;
use App\Http\Livewire\Review\View;

Route::middleware(['auth:sanctum', 'verified'])->group(function ()
{
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/change-password', [UserController::class, 'changePasswordPage'])->name('user.password')->withoutMiddleware('changable-password');
    Route::post('/{user}/change-password', [UserController::class, 'changePassword'])->name('user.change.password')->withoutMiddleware('changable-password');
    Route::delete('/user-roles/{user}', [UserController::class, 'roleRemove'])->name('user.role.remove');
    Route::post('/user-roles/{user}', [UserController::class, 'roleAdd'])->name('user.role.add');

    Route::get('{user}/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile-image/store', [ProfileController::class, 'store'])->name('profile-image.store');
    Route::put('{user}/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('users/find', [UserController::class, 'search'])->name('user.search');
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);

    // Archive
    Route::get('archives', [ArchiveController::class, 'index'])->name('archive.index');
    Route::get('archives/{opras}', [ArchiveController::class, 'show'])->name('archive.show');

    // Report Print
    Route::get('opras-form/{opras}', [ExportPDFController::class, 'oprasForm'])->name('opras-form.print');


    // Opras Form Routes
    Route::get('opras-form', [OprasFormLogicController::class, 'index'])->name('opras.index');
    Route::post('opras-form', [OprasFormLogicController::class, 'createForm'])->name('opras.form');

    Route::prefix('opras-form')->group(function ()
    {
        // Personal Information
        Route::get('personal-information', Index::class)->name('personal-information.index');
        Route::post('personal-information/complete', [PersonalInformationController::class, 'complete'])->name('personal-information.complete');
        Route::resource('personal-information', PersonalInformationController::class)->only([
            'update'
        ]);

        // Performance Agreement
        Route::get('performance-agreement', PerformanceAgreementIndex::class)->name('performance-agreement.index');
        Route::middleware('section:two')->group(function ()
        {
            Route::post('performance-agreement/foward', [PerformanceAgreementController::class, 'foward'])->name('performance-agreement.foward');
            Route::resource('performance-agreement', PerformanceAgreementController::class)->except([
                'index'
            ]);
        });

        // Mid-Year Review
        Route::get('mid-year-review', MidYearReviewIndex::class)->name('mid-year-review.index');
        Route::middleware('section:three')->group(function ()
        {
            Route::post('mid-year-review/foward', [MidYearReviewController::class, 'foward'])->name('mid-year-review.foward');
            Route::resource('mid-year-review', MidYearReviewController::class)->only([
                'update', 'edit'
            ]);
        });

        // Revised Objective
        Route::get('revised-objectives', RevisedObjectiveIndex::class)->name('revised-objectives.index');
        Route::middleware('section:four')->group(function ()
        {
            Route::post('revised-objectives/foward', [RevisedObjectiveController::class, 'foward'])->name('revised-objectives.foward');
            Route::resource('revised-objectives', RevisedObjectiveController::class)->except([
                'index'
            ]);
        });

        // Annual Review
        Route::get('annual-review', AnnualReviewIndex::class)->name('annual-review.index');
        Route::middleware('section:five')->group(function ()
        {
            Route::post('annual-review/foward', [AnnualReviewController::class, 'foward'])->name('annual-review.foward');
            Route::resource('annual-review', AnnualReviewController::class)->only([
                'update', 'edit'
            ]);
        });

        // Attribute of Good Performance
        Route::get('attribute-performance', AttributePerformanceIndex::class)->name('attribute-performance.index');
        Route::middleware('section:six')->group(function ()
        {
            Route::post('attribute-performance/foward', [AttributePerformanceController::class, 'foward'])->name('attribute-performance.foward');
            Route::resource('attribute-performance', AttributePerformanceController::class)->only([
                'update'
            ]);
        });

        // Overall Performance
        Route::get('overall-performance', OverallPerformanceIndex::class)->name('overall-performance.index');
        Route::middleware('section:seven')->group(function ()
        {
            Route::post('overall-performance/foward', [OverallPerformanceController::class, 'foward'])->name('overall-performance.foward');
            Route::resource('overall-performance', OverallPerformanceController::class)->only([
                'update'
            ]);
        });

        // Overall Performance
        Route::get('reward-measure-sanction', RewardMeasureIndex::class)->name('reward-measure-sanction.index');

        // Attachments
        Route::get('attachments', RewardMeasureIndex::class)->name('attachments.index');

        // Submission
        Route::get('submission', SubmissionIndex::class)->name('submission');
        Route::post('{opras}/submission', [OprasFormLogicController::class, 'submitForm'])->name('submission.store');

    });

    Route::prefix('review')->group(function ()
    {
        Route::get('/', View::class)->name('review.index');

        Route::get('{opras}/performance-agreement', PerformanceAgreement::class)->name('review.performance-agreement');

        Route::get('{opras}/mid-year-review', MidYearReview::class)->name('review.mid-year-review');

        Route::get('{opras}/revised-objective', RevisedObjective::class)->name('review.revised-objective');

        Route::get('{opras}/annual-review', AnnualReview::class)->name('review.annual-performance-review');

        Route::get('{opras}/attribute-performance', AttributePerformance::class)->name('review.attribute-good-performance');
        Route::put('attribute-performance/{opras}/review', [AttributePerformanceController::class, 'review'])->name('attribute-performance.review');

        Route::get('{opras}/overall-performance', OverallPerformance::class)->name('review.overall-performance');
        Route::put('{overallPerformance}/overall-performance', [OverallPerformanceController::class, 'review'])->name('review.overall-performance');

        Route::get('{opras}/reward-measure-sanction', RewardMeasure::class)->name('review.reward-measure-sanction');
        Route::post('{opras}/reward-measure-sanction', [RewardMeasureSanctionController::class, 'store'])->name('store.reward-measure-sanction');
    });
});



