<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK_Kematian extends Model
{
    use HasFactory;

    protected $table = 'sk_kematian';

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'tanggal_meninggal',
        'jam_meninggal',
        'tempat_meninggal',
        'sebab_meninggal',
        'tempat_pemakaman',
        'nama_pelapor',
        'nik_pelapor',
        'hubungan_pelapor',
        'alamat_pelapor',
        'tempat_lahir_pelapor',
        'tanggal_lahir_pelapor',
        'agama_pelapor',
        'no_whatsapp',
        'status',
        'verifikasi',
    ];
}
