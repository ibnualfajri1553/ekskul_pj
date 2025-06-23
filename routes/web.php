<?php

use App\Http\Controllers\Admin\AnggaranController;
use App\Http\Controllers\Admin\EkstrakurikulerController;
use App\Http\Controllers\Admin\EkstrakurikulerLaporanController;
use App\Http\Controllers\Admin\InventarisController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\InventoryLaporanController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\KegiatanLaporanController;
use App\Http\Controllers\Admin\PelatihController;
use App\Http\Controllers\Admin\PelatihLaporanController;
use App\Http\Controllers\Admin\PembinaController;
use App\Http\Controllers\Admin\PembinaLaporanController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\SiswaEkstrakurikulerController;
use App\Http\Controllers\Admin\SiswaEkstrakurikulerKartuController;
use App\Http\Controllers\Admin\SiswaEkstrakurikulerLaporanController;
use App\Http\Controllers\Admin\SiswaLaporanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Siswa\LihatEkskulController;
use App\Http\Controllers\Siswa\LihatKegiatanController;
use App\Http\Controllers\Siswa\LihatSiswaController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // bisa ganti dengan view
    });
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', function () {
        return view('siswa.dashboard'); // bisa ganti dengan view
    });
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('siswa', SiswaController::class);
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin/siswa')
    ->name('admin.siswa.')
    ->group(function () {
        Route::get('laporan', [SiswaLaporanController::class, 'preview'])->name('laporan.preview');
        Route::get('laporan/download', [SiswaLaporanController::class, 'download'])->name('laporan.download');
    });


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('pembina', PembinaController::class);
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin/pembina')
    ->name('admin.pembina.')
    ->group(function () {
        Route::get('laporan', [PembinaLaporanController::class, 'preview'])->name('laporan.preview');
        Route::get('laporan/download', [PembinaLaporanController::class, 'download'])->name('laporan.download');
    });


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('pelatih', PelatihController::class);
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin/pelatih')
    ->name('admin.pelatih.')
    ->group(function () {
        Route::get('laporan', [PelatihLaporanController::class, 'preview'])->name('laporan.preview');
        Route::get('laporan/download', [PelatihLaporanController::class, 'download'])->name('laporan.download');
    });

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('ekstrakurikuler', EkstrakurikulerController::class);
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin/ekstrakurikuler')
    ->name('admin.ekstrakurikuler.')
    ->group(function () {
        Route::get('laporan', [EkstrakurikulerLaporanController::class, 'preview'])->name('laporan.preview');
        Route::get('laporan/download', [EkstrakurikulerLaporanController::class, 'download'])->name('laporan.download');
    });


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin/siswa-ekskul', SiswaEkstrakurikulerController::class)
        ->names('admin.siswa_ekskul');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin/siswa_ekskul')
    ->name('admin.siswa_ekskul.')
    ->group(function () {
        Route::get('laporan', [SiswaEkstrakurikulerLaporanController::class, 'preview'])->name('laporan.preview');
        Route::get('laporan/download', [SiswaEkstrakurikulerLaporanController::class, 'download'])->name('laporan.download');
    });

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin/kegiatan', KegiatanController::class)
        ->names('admin.kegiatan');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin/kegiatan')
    ->name('admin.kegiatan.')
    ->group(function () {
        Route::get('laporan', [KegiatanLaporanController::class, 'preview'])->name('laporan.preview');
        Route::get('laporan/download', [KegiatanLaporanController::class, 'download'])->name('laporan.download');
    });


Route::resource('admin/inventory', InventoryController::class)
    ->names('admin.inventory')
    ->parameters(['inventory' => 'id_inventaris']); // penting karena primary key bukan "id"


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin/inventory')
    ->name('admin.inventory.')
    ->group(function () {
        Route::get('laporan', [InventoryLaporanController::class, 'preview'])->name('laporan.preview');
        Route::get('laporan/download', [InventoryLaporanController::class, 'download'])->name('laporan.download');
    });

Route::resource('admin/anggaran', AnggaranController::class)
    ->names('admin.anggaran')
    ->middleware(['auth', 'role:admin']);


// role siswa
Route::middleware(['auth', 'role:siswa'])
    ->prefix('siswa/lihat_siswa')
    ->name('siswa.lihat_siswa.')
    ->group(function () {
        Route::get('/', [LihatSiswaController::class, 'index'])->name('index');
    });


Route::middleware(['auth', 'role:siswa'])
    ->prefix('siswa/lihat_ekskul')
    ->name('siswa.lihat_ekskul.')
    ->group(function () {
        Route::get('/', [LihatEkskulController::class, 'index'])->name('index');
    });

Route::middleware(['auth', 'role:siswa'])
    ->prefix('siswa/lihat_kegiatan')
    ->name('siswa.lihat_kegiatan.')
    ->group(function () {
        Route::get('/', [LihatKegiatanController::class, 'index'])->name('index');
    });
