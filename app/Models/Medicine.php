<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use Searchable;
    use HasFactory;

    protected $casts = [
        'tanggal_expired' => 'date'
    ];

    protected $fillable = [
        'nama_obat',
        'stok',
        'harga',
        'tanggal_expired',
        'gambar_obat'
    ];

    public function hargaRupiah() {
        return 'Rp ' . number_format((int)$this->harga, 0, 0, '.') . ',-';
    }

    protected function gambarObat(): Attribute {
        return Attribute::make(get: function($values) {
            return $values == '' ? '/fallback_img.jpg' : '/storage/images/' . $values;
        });
    }

    /* Search */
    public function toSearchableArray() {
        return [
            'nama_obat' => $this->nama_obat
        ];
    }
}
