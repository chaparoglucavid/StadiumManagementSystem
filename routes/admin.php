<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    FeaturesController,
    SportTypesController,
    PlaygroundSurfaceTypesController,
    StadiumTypesController,
    VendorPackagesController,
    LanguagesController,
    CitiesController,
    RegionsController,
    UsersController,
    GeneralSettingsController
};

Route::prefix('admin')->name('admin.')->middleware(['auth', 'check_user_type:admin'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

    Route::post('change-language]', [DashboardController::class, 'change_language'])->name('change-language');

    Route::resource('users', UsersController::class);
    Route::resource('cities', CitiesController::class);
    Route::resource('regions', RegionsController::class);
    Route::resource('languages', LanguagesController::class);
    Route::post('update-translation/{$lang_id}', [LanguagesController::class, 'updateTranslation'])->name('update-translation');
    Route::resource('features', FeaturesController::class);
    Route::resource('sport-types', SportTypesController::class);
    Route::resource('stadium-types', StadiumTypesController::class);
    Route::resource('playground-surface-types', PlaygroundSurfaceTypesController::class);
    Route::resource('vendor-packages', VendorPackagesController::class);
    Route::get('get-vendor-package-data/{packageUid}', [VendorPackagesController::class, 'getPackageData'])->name('vendor-packages.getPackageData');
    Route::resource('general-settings', GeneralSettingsController::class);
});
