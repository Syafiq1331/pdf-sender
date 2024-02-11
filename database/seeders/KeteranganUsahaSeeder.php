<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeteranganUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Michael Jordan',
                'nik' => '1234567890123458',
                'tempat_lahir' => 'New York',
                'tanggal_lahir' => '1980-02-17',
                'alamat' => '123 Main Street',
                'status_perkawinan' => 'menikah',
                'no_whatsapp' => '081234567892',
                'status' => 'pending',
                'verifikasi' => 'belum-verifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        DB::table('sk_keterangan_usaha')->insert($data);
    }
}
