<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class Upload extends Controller
{
    // Menampilkan form tambah UMKM
    public function create()
    {
        return view('auth.produk'); 
    }

    // Menyimpan data UMKM ke database
    public function store(Request $request)
{
    // Validasi input dari form
    $validatedData = $request->validate([
        'namaToko' => 'required|string|max:50',
        'namaProduk' => 'required|string|max:50',
        'deskripsi' => 'required|string',
        'harga' => 'required|string|max:50',
        'alamat' => 'required|string',
        'telp' => 'required|string|max:13',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'kategori' => 'required|string',
    ]);

    // Debug: Log data
    Log::info('Validated Data:', $validatedData);

    // Proses upload gambar jika ada
    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('produk', 'public');
        $validatedData['foto'] = $path;
    }

    // Debug: Log path gambar
    Log::info('Image Path:', ['path' => $validatedData['foto'] ?? 'No image']);

    // Simpan data ke database
    Product::create([
        'namaToko'     => $validatedData['namaToko'],
        'namaProduk'   => $validatedData['namaProduk'],
        'deskripsi'    => $validatedData['deskripsi'],
        'harga'        => $validatedData['harga'],
        'alamat'       => $validatedData['alamat'],
        'telp'         => $validatedData['telp'],
        'foto'         => $validatedData['foto'] ?? null,
        'kategori'     => $validatedData['kategori'],
    ]);

    // Redirect ke halaman form dengan pesan sukses
    return redirect()->route('produk.create')->with('success', 'Berhasil Ditambahkan!');
}



}