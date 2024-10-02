<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
class ProdukController extends Controller
{
    //

    public function index() {
        $umkms = Product::paginate(10); // Fetch all records
        return view('auth.postingan', compact('umkms'));
    }

    public function destroy($id_produk): RedirectResponse
{
    // Find the UMKM record by ID
    $umkms = Product::where('id_produk', $id_produk)->firstOrFail();

    // Delete the image if it exists
    if ($umkms->foto) {
        // Assuming the photo path is stored as 'produk/image.jpg'
        Storage::disk('public')->delete($umkms->foto);
    }

    // Delete the UMKM record
    $umkms->delete();

    // Redirect to the previous page with a success message
    return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
}


    public function edit($id_produk)
{
    // Find the Umkm record by its ID
    $umkms = Product::findOrFail($id_produk);

    // Return the view for editing the product, passing the UMKM data
    return view('auth.editproduk', compact('umkms'));}


  public function update(Request $request, $id_produk)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'namaToko' => 'required|string|max:255',
            'namaProduk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required',
            'alamat' => 'nullable|string|max:255',
            'telp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required|string|max:255',
        ]);

        // Find the Umkm record
        $umkms = Product::findOrFail($id_produk);

        // Handle the photo upload if a new one is provided
        if ($request->hasFile('foto')) {
            // Delete the old photo from storage (if it exists)
            if ($umkms->foto) {
                // Build the correct path to delete the old photo
                $oldPhotoPath = 'produk/' . basename($umkms->foto); // Use basename to get the filename only
                if (Storage::disk('public')->exists($oldPhotoPath)) {
                    Storage::disk('public')->delete($oldPhotoPath);
                }
            }

            // Store the new photo in the 'produk' directory in the public disk
            $path = $request->file('foto')->store('produk', 'public');

            // Update the photo path in the validated data
            $validatedData['foto'] = $path;
        } else {
            // If no new photo is uploaded, retain the old one
            $validatedData['foto'] = $umkms->foto;
        }

        // Update the record with the validated data
        $umkms->update([
            'namaToko' => $validatedData['namaToko'],
            'namaProduk' => $validatedData['namaProduk'],
            'deskripsi' => $validatedData['deskripsi'],
            'harga' => $validatedData['harga'],
            'alamat' => $validatedData['alamat'],
            'telp' => $validatedData['telp'],
            'foto' => $validatedData['foto'], // Use the new or existing photo
            'kategori' => $validatedData['kategori'],
        ]);

        // Redirect back with a success message
        return redirect()->route('postingan')->with('success', 'Produk berhasil diupdate.');

}

    
    
}
