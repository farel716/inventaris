<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangFactory> */
    use HasFactory;
    

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'kategori',
        'jumlah',
        'lokasi'
    ];

    public function scopeFilterbarang(Builder $query, array $filters): void
    {
    $query->when($filters['search'] ?? false, function ($query, $search) {
        $query->where('nama_barang', 'like', '%' . $search . '%')
              ->orWhere('kode_barang', 'like', '%' . $search . '%')
              ->orWhere('kategori', 'like', '%' . $search . '%');
    });
    }

}
