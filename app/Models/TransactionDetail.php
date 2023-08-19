<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'nama_obat', 'harga_satuan', 'jumlah_beli', 'subtotal'];

    public function transaction() {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
