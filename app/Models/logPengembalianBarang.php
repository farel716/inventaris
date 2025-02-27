<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class logPengembalianBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'kode_barang',
        'jumlah',
        'aksi'
    ];
}
