<?php
use App\Http\Controllers\RazenStyle\Admin\DashboardController;
use App\Http\Controllers\RazenStyle\Admin\ProfilController;
use App\Http\Controllers\RazenStyle\LandingPage\BerandaController;
use App\Http\Controllers\RazenStyle\Admin\BrandController;
use App\Http\Controllers\RazenStyle\LandingPage\PerusahaanController;
use App\Http\Controllers\RazenStyle\MasterData\MediaSosialController;
use App\Http\Controllers\RazenStyle\Admin\TimController;

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

        Route::prefix('tim')->group(function(){
            Route::get('/', [TimController::class, 'index'])->name('razen-style.admin.tim.index');
            Route::get('/create', [TimController::class, 'create'])->name('razen-style.admin.tim.create');
            Route::get('/detail/{id}', [TimController::class, 'show'])->name('razen-style.admin.tim.show');
            Route::post('/', [TimController::class, 'store'])->name('razen-style.admin.tim.store');
            Route::get('/edit/{id}', [TimController::class, 'edit'])->name('razen-style.admin.tim.edit');
            Route::post('/update/{id}', [TimController::class, 'update'])->name('razen-style.admin.tim.update');
            Route::get('/destroy/{id}', [TimController::class, 'destroy'])->name('razen-style.admin.tim.destroy');
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

        Route::prefix('perusahaan')->group(function(){
            Route::get('/', [PerusahaanController::class, 'index'])->name('razen-style.landing-page.perusahaan.index');

            Route::post('/store/section-1', [PerusahaanController::class, 'store_section_1'])->name('razen-style.landing-page.perusahaan.store.section-1');

            Route::post('/store/section-2', [PerusahaanController::class, 'store_section_2'])->name('razen-style.landing-page.perusahaan.store.section-2');

            Route::post('/store/section-3', [PerusahaanController::class, 'store_section_3'])->name('razen-style.landing-page.perusahaan.store.section-3');
        });
    });

    Route::prefix('master-data')->group(function(){
        Route::prefix('media-sosial')->group(function(){
            Route::get('/', [MediaSosialController::class, 'index'])->name('razen-style.master-data.media-sosial.index');
            Route::get('/detail/{id}', [MediaSosialController::class, 'show'])->name('razen-style.master-data.media-sosial.show');
            Route::post('/',[MediaSosialController::class, 'store'])->name('razen-style.master-data.media-sosial.store');
            Route::get('/edit/{id}',[MediaSosialController::class, 'edit'])->name('razen-style.master-data.media-sosial.edit');
            Route::post('/update',[MediaSosialController::class, 'update'])->name('razen-style.master-data.media-sosial.update');
            Route::get('/destroy/{id}',[MediaSosialController::class, 'destroy'])->name('razen-style.master-data.media-sosial.destroy');
        });
    });
});
