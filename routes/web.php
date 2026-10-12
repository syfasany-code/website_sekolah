<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\GaleriController; // Fixed typo 'http' -> 'Http'
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ROUTE PUBLIK (BISA DIAKSES TANPA LOGIN)
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'publicDashboard'])->name('public.dashboard');

// Guru & Staf
Route::get('/guru', [GuruController::class, 'publicGuru'])->name('public.guru');
Route::get('/guru/{id}', [GuruController::class, 'publicShow'])->name('public.guru.show');

// Ekstrakurikuler
Route::get('/ekstrakurikuler', [EkstrakulikulerController::class, 'publicEkstrakulikuler'])->name('public.ekstrakulikuler');
Route::get('/ekstrakurikuler/{slug}', [EkstrakulikulerController::class, 'publicShow'])->name('public.ekstrakulikuler.show');

// Prestasi
Route::get('/prestasi', [PrestasiController::class, 'publicPrestasi'])->name('public.prestasi');
Route::get('/prestasi/{id}', [PrestasiController::class, 'publicShow'])->name('public.prestasi.show');

// Berita
Route::get('/berita', [BeritaController::class, 'publicBerita'])->name('public.berita');
Route::get('/berita/{slug}', [BeritaController::class, 'publicShow'])->name('public.berita.show');

// Galeri
Route::get('/galeri', [GaleriController::class, 'publicGaleri'])->name('public.galeri');
Route::get('/galeri/{id}', [GaleriController::class, 'publicShow'])->name('public.galeri.show');

/*
|--------------------------------------------------------------------------
| ROUTE AUTH (LOGIN & LOGOUT)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login-proses', [AuthController::class, 'prosesLogin'])->name('proses.login');
});

Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ROUTE PANEL ADMIN & OPERATOR (BUTUH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Profil Sekolah
    Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])->name('admin.profil-sekolah.profil');
    Route::get('/profil-sekolah/edit', [ProfilSekolahController::class, 'edit'])->name('admin.profil-sekolah.edit');
    Route::post('/profil-sekolah/update', [ProfilSekolahController::class, 'update'])->name('admin.profil-sekolah.update');

    // Modul Berita
    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('admin.berita.index');
        Route::get('/add-edit/{id?}', [BeritaController::class, 'addEdit'])->name('admin.berita.addEdit');
        Route::post('/save/{id?}', [BeritaController::class, 'save'])->name('admin.berita.save');
        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.delete');
        Route::get('/{id}', [BeritaController::class, 'show'])->name('admin.berita.show')->where('id', '.*');
    });

    // Modul Ekstrakulikuler
    Route::prefix('ekstrakulikuler')->group(function () {
        Route::get('/', [EkstrakulikulerController::class, 'index'])->name('admin.ekstrakulikuler.index');
        Route::get('/add-edit/{id?}', [EkstrakulikulerController::class, 'addEdit'])->name('admin.ekstrakulikuler.addEdit');
        Route::post('/save/{id?}', [EkstrakulikulerController::class, 'save'])->name('admin.ekstrakulikuler.save');
        Route::delete('/{id}', [EkstrakulikulerController::class, 'destroy'])->name('admin.ekstrakulikuler.delete');
        Route::get('/{id}', [EkstrakulikulerController::class, 'show'])->name('admin.ekstrakulikuler.show')->where('id', '.*');
    });

    // Modul Galeri
    Route::prefix('galeri')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('admin.galeri.index');
        Route::get('/add-edit/{id?}', [GaleriController::class, 'addEdit'])->name('admin.galeri.addEdit');
        Route::post('/save/{id?}', [GaleriController::class, 'save'])->name('admin.galeri.save');
        Route::delete('/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.delete');
        Route::get('/{id}', [GaleriController::class, 'show'])->name('admin.galeri.show')->where('id', '.*');
    });

    // Modul Prestasi
     Route::prefix('prestasi')->name('admin.prestasi.')->middleware(['auth'])->group(function () {
        Route::get('/', [PrestasiController::class, 'index'])->name('index');
        Route::get('/add-edit/{id?}', [PrestasiController::class, 'addEdit'])->name('addEdit');
        Route::post('/save/{id?}', [PrestasiController::class, 'save'])->name('save');
        Route::get('/detail/{id}', [PrestasiController::class, 'show'])->name('show');
        Route::delete('/delete/{id}', [PrestasiController::class, 'delete'])->name('delete');
    });

    // Route Baca Data Guru & Siswa (Bisa Diakses Admin & Operator)
    Route::prefix('guru')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('admin.guru.index');
        Route::get('/detail/{id}', [GuruController::class, 'show'])->name('admin.guru.show');
    });

    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('admin.siswa.index');
        Route::get('/detail/{id}', [SiswaController::class, 'show'])->name('admin.siswa.show');
    });

    /*
    |--------------------------------------------------------------------------
    | KHUSUS ROLE ADMIN (CRUD GURU, SISWA, USER)
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {

        // CRUD Guru
        Route::prefix('guru')->group(function () {
            Route::get('/form/{id?}', [GuruController::class, 'addEdit'])->name('admin.guru.form');
            Route::get('/add-edit/{id?}', [GuruController::class, 'addEdit'])->name('admin.guru.addEdit');
            Route::post('/save/{id?}', [GuruController::class, 'save'])->name('admin.guru.save');
            Route::delete('/{id}', [GuruController::class, 'destroy'])->name('admin.guru.delete');
        });

       Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
            Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
            Route::get('/kelas/form/{id?}', [KelasController::class, 'form'])->name('kelas.form');
            Route::post('/kelas/save/{id?}', [KelasController::class, 'save'])->name('kelas.save');
            Route::delete('/kelas/destroy/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
        });

        // CRUD Siswa
        Route::prefix('siswa')->group(function () {
            Route::get('/form/{id?}', [SiswaController::class, 'addEdit'])->name('admin.siswa.form');
            Route::get('/add-edit/{id?}', [SiswaController::class, 'addEdit'])->name('admin.siswa.addEdit');
            Route::post('/save/{id?}', [SiswaController::class, 'save'])->name('admin.siswa.save');
            Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.delete');
        });

        // Manajemen User
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/add-edit/{id?}', [UserController::class, 'addEdit'])->name('admin.user.addEdit');
            Route::post('/save/{id?}', [UserController::class, 'save'])->name('admin.user.save');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
            Route::get('/{id}', [UserController::class, 'show'])->name('admin.user.show');
        });
    });
});
