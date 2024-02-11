<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeteranganAhliWarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'John Smith',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1975-08-20',
                'alamat' => 'Jl. Contoh No. 123',
                'pekerjaan' => 'Wiraswasta',
                'tanggal_meninggal' => '2022-12-31',
                'nama_meninggal' => 'Jane Smith',
                'jenis_kelamin_meninggal' => 'Perempuan',
                'umur_meninggal' => '70',
                'hubungan_dalam_keluarga' => 'Suami',
                'no_whatsapp' => '081234567894',
                'status' => 'pending',
                'verifikasi' => 'belum-verifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        DB::table('sk_keterangan_ahli_waris')->insert($data);
    }
}
