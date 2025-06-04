<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $fillable = [
        'nama_alternatif',
        'nilai_k1',
        'nilai_k2',
        'nilai_k3',
        'nilai_k4',
    ];
}
