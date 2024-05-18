<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kedonaturan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_donatur',
        'nomor_handphone',
        'alamat',
        'jenis_kelamin',
        'email',
        'password',
        'foto_donatur'
    ];
}
