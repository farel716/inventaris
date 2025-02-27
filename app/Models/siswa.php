<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nama',
        'nisn',
        'gender',
        'kelas',
        'jurusan',
        'alamat',
    ];

    public function scopeFilter(Builder $query, array $filters): void
    {
    $query->when($filters['search'] ?? false, function ($query, $search) {
        $query->where('nama', 'like', '%' . $search . '%')
              ->orWhere('nisn', 'like', '%' . $search . '%');
    });
    }

}
