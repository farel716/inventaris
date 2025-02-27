<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class denda extends Model
{
    
    use HasFactory;

    protected $table = 'dendas';

    protected $fillable = [
        'kode_unik',
        'denda'
    ];

    public function terlambat(): BelongsTo
    {
        return $this->belongsTo(peminjaman::class, 'kode_unik', 'kode_unik');
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

}
