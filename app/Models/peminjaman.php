<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class peminjaman extends Model
{
    use HasFactory;
    
    protected $table = 'peminjamen';

    protected $fillable = [
        'nisn',
        'kode_barang',
        'jumlah',
        'dikembalikan',
        'kode_unik'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(barang::class, 'kode_barang', 'kode_barang');
    }

    public function denda()
    {
        return $this->hasOne(denda::class, 'kode_unik', 'kode_unik');
    }

    public function scopeFilterpeminjaman(Builder $query, array $filters): void
    {
    $query->when($filters['search'] ?? false, function ($query, $search) {
        $query->whereHas('siswa', function ($query) use ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        })
        ->orWhereHas('barang', function ($query) use ($search) {
            $query->where('nama_barang', 'like', '%' . $search . '%');
        })
        ->orWhere('kode_unik', 'like', '%' . $search . '%');
    });
}

public function scopeFilterdenda(Builder $query, array $filters): void
    {
    $query->when($filters['search'] ?? false, function ($query, $search) {
        $query->whereHas('siswa', function ($query) use ($search) {
        $query->where('nama', 'like', '%' . $search . '%');
        });
    });
    }
}
