<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK_KelakuanBaik extends Model
{
    use HasFactory;

    protected $table = 'sk_kelakuan_baik';

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status',
        'dusun_tinggal',
        'rt_rw',
        'no_whatsapp',
        'status',
        'verifikasi',
    ];
}
