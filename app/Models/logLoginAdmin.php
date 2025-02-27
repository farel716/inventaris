<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class logLoginAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'username'
    ];
}
