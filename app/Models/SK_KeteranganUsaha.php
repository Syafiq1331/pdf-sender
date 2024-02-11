<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK_KeteranganUsaha extends Model
{
    use HasFactory;

    protected $table = 'sk_keterangan_usaha';

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'status_perkawinan',
        'no_whatsapp',
        'status',
        'verifikasi',
    ];
}
