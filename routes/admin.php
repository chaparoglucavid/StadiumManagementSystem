<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    FeaturesController,
    SportTypesController,
    PlaygroundSurfaceTypesController,
    StadiumTypesController
};

Route::prefix('admin')->name('admin.')->middleware(['auth', 'check_user_type:admin'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

    Route::resource('features', FeaturesController::class);
    Route::resource('sport-types', SportTypesController::class);
    Route::resource('stadium-types', StadiumTypesController::class);
    Route::resource('playground-surface-types', PlaygroundSurfaceTypesController::class);
});
