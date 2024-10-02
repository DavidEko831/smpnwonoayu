<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Upload;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/tentangkami', function () {
    return view('tentangkami');
})->name('tentangkami');

Route::get('/desa', function () {
    return view('desa');
})->name('desa');


Route::get('/minuman', [KategoriController::class, 'minuman'])->name('minuman');

Route::get('/makanan', [KategoriController::class, 'makanan'])->name('makanan');

// Proses login
Route::post('/login', [LoginController::class, 'login'])->name('loginsubmit');

// Proses logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//middleware
Route::middleware('auth')->group(function () {
    Route::get('/homeadmin', function () {
        return view('auth.homeadmin');
    })->name('homeadmin');

    Route::get('/homeadmin/desaadmin', function () {
        return view('auth.desaadmin');
    })->name('desaadmin');

    Route::get('homeadmin/minumanadmin', [KategoriController::class, 'minumanadmin'])->name('minumanadmin');

    Route::get('homeadmin/makananadmin', [KategoriController::class, 'makananadmin'])->name('makananadmin');


    Route::get('/homeadmin/tentangKamiadmin', function () {
        return view('auth.tentangkamiadmin');
    })->name('tentangKamiadmin');

    Route::get('/homeadmin/postingan', [ProdukController::class, 'index'])->name('postingan');


    

    Route::get('/homeadmin/produk/create', [Upload::class, 'create'])->name('produk.create');
    Route::post('/homeadmin/produk/store', [Upload::class, 'store'])->name('produk.store');
    

    Route::get('/homeadmin/editproduk', [ProdukController::class, 'edit'])->name('editproduk');


    Route::get('/homeadmin/postingan/delete/{id_produk}', [ProdukController::class, 'destroy'])->name('postingan.hapus');

    Route::get('/homeadmin/postingan/edit/{id_produk}', [ProdukController::class, 'edit'])->name('postingan.edit');

    Route::put('/homeadmin/postingan/update/{id_produk}', [ProdukController::class, 'update'])->name('postingan.update');


});
