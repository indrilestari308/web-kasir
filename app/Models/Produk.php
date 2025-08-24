<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Supaya Laravel tidak mencari 'produks'
    protected $table = 'produk';

    protected $fillable = [
        'kategori_id',
        'nama',
        'kode',
        'stok',
        'harga_beli',
        'harga_jual',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
