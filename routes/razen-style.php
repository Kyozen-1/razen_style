<?php
use App\Http\Controllers\RazenStyle\Admin\DashboardController;
use App\Http\Controllers\RazenStyle\Admin\ProfilController;
use App\Http\Controllers\RazenStyle\LandingPage\BerandaController;
use App\Http\Controllers\RazenStyle\Admin\BrandController;

Route::prefix('razen-style')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::prefix('dashboard')->group(function(){
            Route::get('/', [DashboardController::class, 'index'])->name('razen-style.admin.dashboard.index');
            Route::post('/change', [DashboardController::class, 'change'])->name('razen-style.admin.dashboard.change');
        });

        Route::prefix('profil')->group(function(){
            Route::get('/', [ProfilController::class, 'index'])->name('razen-style.admin.profil.index');
            Route::get('/detail/{id}', [ProfilController::class, 'show']);
            Route::post('/',[ProfilController::class, 'store'])->name('razen-style.admin.profil.store');
            Route::get('/edit/{id}',[ProfilController::class, 'edit']);
            Route::post('/update',[ProfilController::class, 'update'])->name('razen-style.admin.profil.update');
            Route::get('/destroy/{id}',[ProfilController::class, 'destroy']);
        });

        Route::prefix('brand')->group(function(){
            Route::get('/', [BrandController::class, 'index'])->name('razen-style.admin.brand.index');
            Route::get('/detail/{id}', [BrandController::class, 'show'])->name('razen-style.admin.brand.show');
            Route::post('/',[BrandController::class, 'store'])->name('razen-style.admin.brand.store');
            Route::get('/edit/{id}',[BrandController::class, 'edit'])->name('razen-style.admin.brand.edit');
            Route::post('/update',[BrandController::class, 'update'])->name('razen-style.admin.brand.update');
            Route::get('/destroy/{id}',[BrandController::class, 'destroy'])->name('razen-style.admin.brand.destroy');
        });
    });

    Route::prefix('landing-page')->group(function(){
        Route::prefix('beranda')->group(function(){
            Route::get('/', [BerandaController::class, 'index'])->name('razen-style.landing-page.beranda.index');
            Route::get('/detail/{id}', [BerandaController::class, 'show'])->name('razen-style.landing-page.beranda.show');
            Route::post('/',[BerandaController::class, 'store'])->name('razen-style.landing-page.beranda.store');
            Route::get('/edit/{id}',[BerandaController::class, 'edit'])->name('razen-style.landing-page.beranda.edit');
            Route::post('/update',[BerandaController::class, 'update'])->name('razen-style.landing-page.beranda.update');
            Route::get('/destroy/{id}',[BerandaController::class, 'destroy'])->name('razen-style.landing-page.beranda.destroy');

            Route::post('/store/section-3', [BerandaController::class, 'store_section_3'])->name('razen-style.landing-page.beranda.store.section-3');

            Route::post('/store/section-5', [BerandaController::class, 'store_section_5'])->name('razen-style.landing-page.beranda.store.section-5');

            Route::post('/store/section-6', [BerandaController::class, 'store_section_6'])->name('razen-style.landing-page.beranda.store.section-6');
        });
    });
});
