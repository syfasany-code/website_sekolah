<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilSekolahController;
use App\http\Controllers\GaleriController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrestasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'publicDashboard'])->name('public.dashboard');

// Route Halaman Publik Guru
Route::get('/guru', [GuruController::class, 'publicGuru'])->name('public.guru');
Route::get('/guru/{id}', [GuruController::class, 'publicShow'])->name('public.guru.show');


// Route Halaman Publik Ekstrakurikuler
Route::get('/ekstrakurikuler', [EkstrakulikulerController::class, 'publicEkstrakulikuler'])->name('public.ekstrakulikuler');
Route::get('/ekstrakurikuler/{id}', [EkstrakulikulerController::class, 'publicShow'])->name('public.ekstrakulikuler.show');

// Route Halaman Publik Prestasi
Route::get('/prestasi', [PrestasiController::class, 'publicPrestasi'])->name('public.prestasi');
Route::get('/prestasi/{id}', [PrestasiController::class, 'publicShow'])->name('public.prestasi.show');

// Route Halaman Publik Berita
Route::get('/berita', [BeritaController::class, 'publicBerita'])->name('public.berita');
Route::get('/berita/{id}', [BeritaController::class, 'publicShow'])->name('public.berita.show');

// Route Halaman Publik Galeri
Route::get('/galeri', [GaleriController::class, 'publicGaleri'])->name('public.galeri');
Route::get('/galeri/{id}', [GaleriController::class, 'publicShow'])->name('public.galeri.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login-proses', [AuthController::class, 'prosesLogin'])->name('proses.login');
});

Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])->name('admin.profil');
    Route::get('/profil-sekolah/edit', [ProfilSekolahController::class, 'edit'])->name('admin.profil.edit');

    // Gunakan POST di route
    Route::post('/profil-sekolah/update', [ProfilSekolahController::class, 'update'])->name('admin.profil.update');

    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('admin.berita.index');
        Route::get('/add-edit/{id?}', [BeritaController::class, 'addEdit'])->name('admin.berita.addEdit');
        Route::post('/save/{id?}', [BeritaController::class, 'save'])->name('admin.berita.save');
        Route::get('/{id}', [BeritaController::class, 'show'])->name('admin.berita.show');
        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.delete');
    });

    Route::prefix('ekstrakulikuler')->group(function () {
        Route::get('/', [EkstrakulikulerController::class, 'index'])->name('admin.ekstrakulikuler.index');
        Route::get('/add-edit/{id?}', [EkstrakulikulerController::class, 'addEdit'])->name('admin.ekstrakulikuler.addEdit');
        Route::post('/save/{id?}', [EkstrakulikulerController::class, 'save'])->name('admin.ekstrakulikuler.save');
        Route::get('/{id}', [EkstrakulikulerController::class, 'show'])->name('admin.ekstrakulikuler.show');
        Route::delete('/{id}', [EkstrakulikulerController::class, 'destroy'])->name('admin.ekstrakulikuler.delete');
    });

    Route::prefix('galeri')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('admin.galeri.index');
        Route::get('/add-edit/{id?}', [GaleriController::class, 'addEdit'])->name('admin.galeri.addEdit');
        Route::post('/save/{id?}', [GaleriController::class, 'save'])->name('admin.galeri.save');
        Route::get('/{id}', [GaleriController::class, 'show'])->name('admin.galeri.show');
        Route::delete('/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.delete');
    });

    Route::prefix('prestasi')->group(function () {
        Route::get('/', [PrestasiController::class, 'index'])->name('admin.prestasi.index');
        Route::get('/add-edit/{id?}', [PrestasiController::class, 'addEdit'])->name('admin.prestasi.addEdit');
        Route::post('/save/{id?}', [PrestasiController::class, 'save'])->name('admin.prestasi.save');
        Route::get('/{id}', [PrestasiController::class, 'show'])->name('admin.prestasi.show');
        Route::delete('/{id}', [PrestasiController::class, 'delete'])->name('admin.prestasi.delete');
    });



    Route::middleware('role:admin')->group(function () {

        Route::prefix('guru')->group(function () {
            Route::get('/', [GuruController::class, 'index'])->name('admin.guru.index');
            Route::get('/add-edit/{id?}', [GuruController::class, 'addEdit'])->name('admin.guru.addEdit');
            Route::post('/save/{id?}', [GuruController::class, 'save'])->name('admin.guru.save');
            Route::get('/{id}', [GuruController::class, 'show'])->name('admin.guru.show');
            Route::delete('/{id}', [GuruController::class, 'destroy'])->name('admin.guru.delete');
        });

        Route::prefix('siswa')->group(function () {
            Route::get('/', [SiswaController::class, 'index'])->name('admin.siswa.index');
            Route::get('/add-edit/{id?}', [SiswaController::class, 'addEdit'])->name('admin.siswa.addEdit');
            Route::post('/save/{id?}', [SiswaController::class, 'save'])->name('admin.siswa.save');
            Route::get('/{id}', [SiswaController::class, 'show'])->name('admin.siswa.show');
            Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.delete');
        });

        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/add-edit/{id?}', [UserController::class, 'addEdit'])->name('admin.user.addEdit');
            Route::post('/save/{id?}', [UserController::class, 'save'])->name('admin.user.save');
            Route::get('/{id}', [UserController::class, 'show'])->name('admin.user.show');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
        });
    });
});
