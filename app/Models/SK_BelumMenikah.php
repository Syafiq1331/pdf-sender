<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK_BelumMenikah extends Model
{
    use HasFactory;

    protected $table = 'sk_belum_menikah';
    protected $fillable = ['nama', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'status', 'verifikasi', 'no_whatsapp'];
}
