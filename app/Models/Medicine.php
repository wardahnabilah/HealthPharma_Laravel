<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'stok',
        'harga',
        'tanggal_expired',
        'gambar_obat'
    ];
}
