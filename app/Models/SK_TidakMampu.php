<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK_TidakMampu extends Model
{
    use HasFactory;

    protected $table = 'sk_tidak_mampu';

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'nama_ayah',
        'umur_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'umur_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'no_whatsapp',
        'status',
        'verifikasi',
    ];
}
