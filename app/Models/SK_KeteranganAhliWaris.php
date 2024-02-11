<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK_KeteranganAhliWaris extends Model
{
    use HasFactory;

    protected $table = 'sk_keterangan_ahli_waris';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'pekerjaan',
        'tanggal_meninggal',
        'nama_meninggal',
        'jenis_kelamin_meninggal',
        'umur_meninggal',
        'hubungan_dalam_keluarga',
        'no_whatsapp',
        'status',
        'verifikasi',
    ];
}
