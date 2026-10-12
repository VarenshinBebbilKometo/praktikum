<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return 'Hello Laravel!';
});


// Praktik 2.1 Route sederhana
Route::get('/halo', function () {
    return 'Halo, selamat datang di Laravel 13!';
});


Route::get('/waktu', fn () => now()->format('d-m-Y H:i:s'));


// Praktik 2.2 Parameter
Route::get('/profil/{nama}', function (string $nama) {
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
    })
    ->name('dashboard');


    Route::get('/pengaturan', function () {
        return 'Pengaturan Admin';
    })
    ->name('pengaturan');

});



// Praktik 2.6 Redirect dan Fallback
Route::redirect('/beranda', '/');


Route::fallback(function () {
    return response('Halaman tidak ditemukan (kustom).', 404);
});