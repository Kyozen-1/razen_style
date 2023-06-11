<?php
use App\Http\Controllers\RazenStyle\Admin\DashboardController;

Route::prefix('razen-style')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::prefix('dashboard')->group(function(){
            Route::get('/', [DashboardController::class, 'index'])->name('razen-style.admin.dashboard.index');
            Route::post('/change', [DashboardController::class, 'change'])->name('razen-style.admin.dashboard.change');
        });
    });
});
