<?php

use App\Http\Controllers\AnnualReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MidYearReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OprasFormLogicController;
use App\Http\Controllers\PerformanceAgreementController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\RevisedObjectiveController;
use App\Http\Livewire\Form\AnnualReview\Index as AnnualReviewIndex;
use App\Http\Livewire\Form\AttributePerformance\Index as AttributePerformanceIndex;
use App\Http\Livewire\Form\MidYearReview\Index as MidYearReviewIndex;
use App\Http\Livewire\Form\PerformanceAgreement\Index as PerformanceAgreementIndex;
use App\Http\Livewire\Form\PersonalInformation\Index;
use App\Http\Livewire\Form\RevisedObjective\Index as RevisedObjectiveIndex;
use App\Http\Livewire\Review\AnnualReview;
use App\Http\Livewire\Review\MidYearReview;
use App\Http\Livewire\Review\PerformanceAgreement;
use App\Http\Livewire\Review\RevisedObjective;
use App\Http\Livewire\Review\View;

Route::middleware(['auth:sanctum', 'verified'])->group(function ()
{
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/change-password', [UserController::class, 'changePasswordPage'])->name('user.password')->withoutMiddleware('changable-password');
    Route::post('/{user}/change-password', [UserController::class, 'changePassword'])->name('user.change.password')->withoutMiddleware('changable-password');
    Route::delete('/user-roles/{user}', [UserController::class, 'roleRemove'])->name('user.role.remove');
    Route::post('/user-roles/{user}', [UserController::class, 'roleAdd'])->name('user.role.add');
    Route::get('users/find', [UserController::class, 'search'])->name('user.search');
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);

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
            Route::post('attribute-performance/foward', [AnnualReviewController::class, 'foward'])->name('attribute-performance.foward');
            Route::resource('attribute-performance', AnnualReviewController::class)->only([
                'update', 'edit'
            ]);
        });

    });

    Route::prefix('review')->group(function ()
    {
       Route::get('/', View::class)->name('review.index');
       Route::get('{opras}/performance-agreement', PerformanceAgreement::class)->name('review.performance-agreement');
       Route::get('{opras}/mid-year-review', MidYearReview::class)->name('review.mid-year-review');
       Route::get('{opras}/revised-objective', RevisedObjective::class)->name('review.revised-objective');
       Route::get('{opras}/annual-review', AnnualReview::class)->name('review.annual-performance-review');
    });
});



