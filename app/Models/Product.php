<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_produk';

    // If the primary key is not an incrementing integer
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'products'; 
    protected $fillable = [
        'namaToko',
        'namaProduk',
        'deskripsi',
        'harga',
        'alamat',
        'telp',
        'foto',
        'kategori',
    ];
    
}