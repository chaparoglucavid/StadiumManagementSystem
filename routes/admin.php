<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController
};

Route::prefix('admin')->name('admin.')->middleware(['auth', 'check_user_type:admin'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
});
