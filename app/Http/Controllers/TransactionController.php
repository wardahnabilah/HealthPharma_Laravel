<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Show transaction page
    public function showTransactionPage() {
        $transactionData = Transaction::latest()->paginate(10);
        
        return view('transactions', ['transactions' => $transactionData]);
    }

    // Add a transaction
    public function addTransaction(Request $request) {
        if(!auth()->check()) {
            return 'Not login';
        }

        $validatedReq = $request->validate([
            'tanggalTransaksi' => ['required'],
            'totalHarga' => ['required'],
            'orderList' => ['required']
        ]);

        // Sanitize the requests
        $validatedReq['tanggalTransaksi'] = strip_tags($validatedReq['tanggalTransaksi']);
        $validatedReq['totalHarga'] = strip_tags($validatedReq['totalHarga']); 

        // Store in transaction table
        $newTransaction = Transaction::create([
            'tanggal_transaksi' => $validatedReq['tanggalTransaksi'],
            'employee_id' => auth()->user()->id,
            'total_harga' => $validatedReq['totalHarga']
        ]);

        foreach($validatedReq['orderList'] as $orderItem) {
            // Store orderList in transaction detail table
            $newTransaction->details()->create([
                'nama_obat' => $orderItem['namaObat'], 
                'harga_satuan' => $orderItem['hargaSatuan'],
                'jumlah_beli' => $orderItem['jumlahBeli'],
                'subtotal' => $orderItem['subtotalHarga']
            ]);

             // Update medicinesStok
            $updateMedicine = Medicine::find( $orderItem['id']);
            $updateMedicine->stok = $updateMedicine->stok - $orderItem['jumlahBeli'];
            $updateMedicine->save();
        }

        return 'Stored!';
    }

    // Delete transaction
    public function deleteTransaction(Transaction $transaction) {
        $transaction->delete();

        return back()->with('success', 'Transaksi berhasil dibatalkan');
    }
}
