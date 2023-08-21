<?php

namespace App\Http\Controllers;

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

    // Delete transaction
    public function deleteTransaction(Transaction $transaction) {
        $transaction->delete();

        return back()->with('success', 'Transaksi berhasil dibatalkan');
    }
}
