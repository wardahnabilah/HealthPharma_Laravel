<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function addTransaction(Request $request) {
        $validatedRequest = $request->validate([
            'tanggalTransaksi' => ['required'],
            'totalHarga' => ['required'],
            'orderList' => ['required']
        ]);

        // Store in transaction table
        $newTransaction = Transaction::create([
            'tanggal_transaksi' => $validatedRequest['tanggalTransaksi'],
            'employee_id' => auth()->user()->id,
            'total_harga' => $validatedRequest['totalHarga']
        ]);

        // Store orderList in transaction detail table
        foreach($validatedRequest['orderList'] as $orderItem) {
            $newTransaction->details()->create([
                'nama_obat' => $orderItem['namaObat'], 
                'harga_satuan' => $orderItem['hargaSatuan'],
                'jumlah_beli' => $orderItem['jumlahBeli'],
                'subtotal' => $orderItem['subtotalHarga']
            ]);
        }

        return 'Stored!';
    }
}
