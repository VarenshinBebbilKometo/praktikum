<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MatakuliahController;


// Halaman utama
Route::get('/', function () {
    return view('welcome');
});


// Route sederhana
Route::get('/hello', function () {
    return 'Hello Laravel!';
});


// Praktik 2.1 Route sederhana
Route::get('/halo', function () {
    return 'Halo, selamat datang di Laravel 13!';
});

Route::get('/waktu', fn () => now()->format('d-m-Y H:i:s'));


// Praktik 2.2 Parameter
Route::get('/profil', [MahasiswaController::class, 'profil'])
    ->name('mahasiswa.profil');

Route::get('/profil/{nama?}', function (?string $nama = 'semua') {
    return "Halo, {$nama}!";
});

Route::get('/kategori/{nama?}', function (?string $nama = 'semua') {
    return "Menampilkan kategori: {$nama}";
});

Route::get('/kelas/{kode}/mahasiswa/{nim}', function (string $kode, string $nim) {
    return "Kelas {$kode}, NIM {$nim}";
});


// Praktik 2.3 Constraint
Route::get('/artikel/{id}', function (int $id) {
    return "Artikel nomor {$id}";
})->whereNumber('id');

Route::get('/pengguna/{username}', function (string $username) {
    return "Pengguna: {$username}";
})->whereAlpha('username');

Route::get('/kode/{kode}', function (string $kode) {
    return "Kode: {$kode}";
})->where('kode', '[A-Z]{3}[0-9]{2}');


// Praktik 2.4 View
Route::view('/tentang', 'tentang')->name('tentang');

Route::get('/kontak', function () {
    return view('kontak', [
        'email' => 'info@kampus.ac.id'
    ]);
})->name('kontak');


// Praktik 2.5 Group Prefix
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return 'Dashboard Admin';
    })->name('dashboard');

    Route::get('/pengaturan', function () {
        return 'Pengaturan Admin';
    })->name('pengaturan');

});


// Praktik 2.6 Redirect
Route::redirect('/beranda', '/');


// Route Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'daftar'])
    ->name('mahasiswa.daftar');

Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'detail'])
    ->name('mahasiswa.detail');


// Route Products
Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{id}', [ProductController::class, 'show']);


// Praktikum Laravel 13 Pertemuan 6
// Menambahkan dan Menampilkan Data Jurusan

Route::get('/jurusan', [JurusanController::class, 'index'])
    ->name('jurusan.index');

Route::get('/jurusan/create', [JurusanController::class, 'create'])
    ->name('jurusan.create');

Route::post('/jurusan', [JurusanController::class, 'store'])
    ->name('jurusan.store');

// Route detail jurusan dari praktikum sebelumnya
Route::get('/jurusan/{id}', [JurusanController::class, 'show'])
    ->whereNumber('id')
    ->name('jurusan.show');

Route::get('/jurusan/{id}', [JurusanController::class, 'show'])
    ->whereNumber('id')
    ->name('jurusan.show');
    

    // Route Mata Kuliah
Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])
    ->name('matakuliah.create');

Route::post('/matakuliah', [MatakuliahController::class, 'store'])
    ->name('matakuliah.store');
    
Route::get('/matakuliah', [MatakuliahController::class, 'index'])
    ->name('matakuliah.index');
    
Route::get('/matakuliah/{id}', [MatakuliahController::class, 'show'])
    ->name('matakuliah.show');


// Fallback
Route::fallback(function () {
    return response('Halaman tidak ditemukan (kustom).', 404);
});

