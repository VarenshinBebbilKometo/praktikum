<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProductController;

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


//praktik contoh produk
Route::get('/produk',
    [ProdukController::class,'index'])
->name('produk.index');


Route::get('/produk/{id}',
  [ProdukController::class,'show'])
->name('produk.show');




//praktik baru
Route::get('/profil', 
[MahasiswaController::class,'profil'])
->name('mahasiswa.profil');


Route::get('/mahasiswa',
[MahasiswaController::class,'daftar'])
->name('mahasiswa.daftar');


Route::get('/mahasiswa/{nim}',
[MahasiswaController::class,'detail'])
->name('mahasiswa.detail');

//product
Route::get('/products',
[ProductController::class,
'index']);


Route::get('/products/{id}',
function ($id) {
    return'Products #' . $id;
});

Route::get('/products/{id}',[ProductController::class,'show']);