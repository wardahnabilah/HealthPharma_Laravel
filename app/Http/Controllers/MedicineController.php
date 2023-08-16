<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    public function showMedicinePage() {
        return view('medicines');
    }

    /* Add medicine */
    public function showAddMedicine() {
        return view('medicine_add');
    }

    public function addMedicine(Request $request) {
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
        Storage::put('public/avatar/' . $filename, $resizedImage);

        // Store in database
        $newMedicine = Medicine::create([
            'nama_obat' => $validatedReq['namaObat'],
            'stok' => $validatedReq['stokObat'],
            'harga' => $validatedReq['hargaObat'],
            'tanggal_expired' => $validatedReq['expiredObat'],
            'gambar_obat' => $filename
        ]);
        
        return redirect('/medicine/' . $newMedicine->id);
    }
}
