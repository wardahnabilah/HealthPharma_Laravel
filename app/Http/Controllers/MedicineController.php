<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'expiredObat' => ['required']
        ]);

        // Store in database
        $newMedicine = Medicine::create([
            'nama_obat' => $validatedReq['namaObat'],
            'stok' => $validatedReq['stokObat'],
            'harga' => $validatedReq['hargaObat'],
            'tanggal_expired' => $validatedReq['expiredObat']
        ]);
        
        return redirect('/medicine/' . $newMedicine->id);
    }
}
