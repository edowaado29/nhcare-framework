<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anakasuh extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_anakasuh',
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'keterangan',
        'asrama',
        'no_akta',
        'img_akta',
        'no_kk',
        'img_kk',
        'no_skko',
        'img_skko',
        'nama_sekolah',
        'tingkat',
        'kelas',
        'cabang',
        'nama_ayah',
        'nik_ayah',
        'nama_ibu',
        'nama_ibu',
        'nik_wali',
        'nik_wali',
        'img_anak'
    ];
}
