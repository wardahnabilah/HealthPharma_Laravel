<?php

namespace App\Models;

use App\Models\User;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal_transaksi', 'employee_id', 'total_harga'];

    protected $casts = [
        'tanggal_transaksi' => 'date'
    ];

    public function totalHargaRupiah() {
        return 'Rp ' . number_format($this->total_harga, 0, '', '.') . ',-';
    }


    public function details() {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
    
    public function employee() {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
