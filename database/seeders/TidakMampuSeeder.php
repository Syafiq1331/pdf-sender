<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TidakMampuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'John Doe',
                'nik' => '1234567890123456',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'alamat' => 'Jl. Contoh No. 123',
                'jenis_kelamin' => 'Laki-laki',
                'nama_ayah' => 'Doe Ayah',
                'umur_ayah' => '55',
                'pekerjaan_ayah' => 'PNS',
                'penghasilan_ayah' => '5000000',
                'nama_ibu' => 'Doe Ibu',
                'umur_ibu' => '50',
                'pekerjaan_ibu' => 'Guru',
                'penghasilan_ibu' => '4000000',
                'no_whatsapp' => '081234567890',
                'status' => 'pending',
                'verifikasi' => 'belum-verifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        DB::table('sk_tidak_mampu')->insert($data);
    }
}
