<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class KategoriController extends Controller
{
    //

    public function makananadmin(Request $request)
    {
        // Ambil input pencarian
        $keyword = $request->input('search');

        $products = Product::where('kategori', 'makanan')
            ->when($keyword, function ($query) use ($keyword) {
                // Filter berdasarkan namaToko atau namaProduk hanya jika ada keyword
                $query->where(function ($query) use ($keyword) {
                    $query->where('namaToko', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('namaProduk', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->paginate(10); // Paginate untuk hasil pencarian

        return view('auth.makananadmin', ['produks' => $products,'search' => $keyword]);
    }
    

    public function makanan(Request $request)
    {
        // Ambil input pencarian
        $keyword = $request->input('search');
    
        $products = Product::where('kategori', 'makanan')
            ->when($keyword, function ($query) use ($keyword) {
                // Filter berdasarkan namaToko atau namaProduk hanya jika ada keyword
                $query->where(function ($query) use ($keyword) {
                    $query->where('namaToko', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('namaProduk', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->paginate(10); // Paginate untuk hasil pencarian
    
        return view('makanan', ['produks' => $products, 'search' => $keyword]);
    }
    

    public function minuman(Request $request)
    {
        // Ambil input pencarian
        $keyword = $request->input('search');

        $products = Product::where('kategori', 'minuman')
            ->when($keyword, function ($query) use ($keyword) {
                // Filter berdasarkan namaToko atau namaProduk hanya jika ada keyword
                $query->where(function ($query) use ($keyword) {
                    $query->where('namaToko', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('namaProduk', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->paginate(10); // Paginate untuk hasil pencarian

        // Mengembalikan view dengan produk yang sudah difilter
        return view('minuman', ['produks' => $products,'search' => $keyword]);
    }

    public function minumanadmin(Request $request)
    {
        // Ambil input pencarian
        $keyword = $request->input('search');

        $products = Product::where('kategori', 'minuman')
            ->when($keyword, function ($query) use ($keyword) {
                // Filter berdasarkan namaToko atau namaProduk hanya jika ada keyword
                $query->where(function ($query) use ($keyword) {
                    $query->where('namaToko', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('namaProduk', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->paginate(10); // Paginate untuk hasil pencarian

        return view('auth.minumanadmin', ['produks' => $products,'search' => $keyword]);
    }

  
}