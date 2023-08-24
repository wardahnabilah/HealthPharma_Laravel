<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    /* Get all medicines */ 
    public function showMedicinePage() {
        $medicines = Medicine::get();

        return view('medicines', ['medicines' => $medicines]);
    }

    /* Get a medicine (medicine detail)*/
    public function getAMedicine(Medicine $medicine) {
        return view('medicine_detail', [
            'id_obat' => $medicine->id,
            'nama_obat' => $medicine->nama_obat,
            'stok' => $medicine->stok,
            'hargaRupiah' => $medicine->hargaRupiah(),
            'tanggal_expired' => $medicine->tanggal_expired,
            'gambar_obat' => $medicine->gambar_obat
        ]);
    }

    /* Add medicine */
    public function showAddMedicine() {
        return view('medicine_add');
    }

    public function addMedicine(Request $request) {
        // Remove 'Rp and ,-'
        $request['hargaObat'] = preg_replace('/\D/', '', $request['hargaObat']);
        
        $validatedReq = $request->validate([
            'namaObat' => ['required', 'min:3', Rule::unique('medicines', 'nama_obat')],
            'stokObat' => ['required', 'min:0', 'integer'],
            'hargaObat' => ['required', 'min:0', 'integer'],
            'expiredObat' => ['required'],
            'gambarObat' => ['required', 'image', 'max:7000']
        ]);

        // Resized the image
        $resizedImage = Image::make($validatedReq['gambarObat'])->fit(125)->encode('jpg');

        // Image's filename
        $filename = $validatedReq['namaObat'] . '.jpg';

        // Store the image in storage folder
        Storage::put('public/images/' . $filename, $resizedImage);

        // Store in database
        $newMedicine = Medicine::create([
            'nama_obat' => $validatedReq['namaObat'],
            'stok' => $validatedReq['stokObat'],
            'harga' => $validatedReq['hargaObat'],
            'tanggal_expired' => $validatedReq['expiredObat'],
            'gambar_obat' => $filename
        ]);
        
        return redirect('/medicines')->with('success', 'Obat berhasil ditambahkan');
    }

    /* Edit a medicine */
    public function showEditMedicine(Medicine $medicine) {
        return view('medicine_edit', [
            'id_obat' => $medicine->id,
            'nama_obat' => $medicine->nama_obat,
            'stok' => $medicine->stok,
            'harga' => $medicine->harga,
            'tanggal_expired' => $medicine->tanggal_expired,
            'gambar_obat' => $medicine->gambar_obat
        ]);
    }

    public function editAMedicine(Request $request, Medicine $medicine) {
        // Remove 'Rp and ,-'
        $request['hargaObat'] = preg_replace('/\D/', '', $request['hargaObat']);
        
        $validatedReq = $request->validate([
            'namaObat' => ['required', 'min:3', Rule::unique('medicines', 'nama_obat')->ignore($medicine->id)],
            'stokObat' => ['required', 'min:0', 'integer'],
            'hargaObat' => ['required', 'min:0', 'integer'],
            'expiredObat' => ['required'],
            'gambarObat' => ['image', 'max:7000']
        ]);

        // If the image is changed
        if(isset($validatedReq['gambarObat'])) {
            // Resized the image
            $resizedImage = Image::make($validatedReq['gambarObat'])->fit(125)->encode('jpg');

            $filename = $validatedReq['namaObat'] . '.jpg';

            // Store in storage folder
            Storage::put('/public/images/' . $filename, $resizedImage);

            // Update image's filename in database
            $medicine->update(['gambar_obat' => $filename]);
        }

        $medicine->update([
            'nama_obat' => $validatedReq['namaObat'],
            'stok' => $validatedReq['stokObat'],
            'harga' => $validatedReq['hargaObat'],
            'tanggal_expired' => $validatedReq['expiredObat']
        ]);

        return redirect('/medicine/' . $medicine->id)->with('success', 'Perubahan berhasil disimpan');
    }
    

    /* Delete a medicine */
    public function deleteAMedicine(Medicine $medicine) {
        $medicine->delete();

        return redirect('/medicines')->with('success', 'Obat berhasil dihapus');
    }

    /* Search medicine by keyword */
    public function searchMedicine($keyword) {
        $medicines = Medicine::search($keyword)->get();

        return $medicines;
    }
}
