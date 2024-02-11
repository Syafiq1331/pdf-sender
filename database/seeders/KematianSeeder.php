<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KematianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Maria Garcia',
                'nik' => '1234567890123459',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1950-12-25',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Katolik',
                'alamat' => 'Jl. Kematian No. 123',
                'tanggal_meninggal' => '2023-01-01',
                'jam_meninggal' => '08:00',
                'tempat_meninggal' => 'RS Cipto Mangunkusumo',
                'sebab_meninggal' => 'Sakit Jantung',
                'tempat_pemakaman' => 'Taman Pemakaman Umum',
                'nama_pelapor' => 'John Doe',
                'nik_pelapor' => '1234567890123460',
                'hubungan_pelapor' => 'Saudara',
                'alamat_pelapor' => 'Jl. Pelapor No. 456',
                'tempat_lahir_pelapor' => 'Jakarta',
                'tanggal_lahir_pelapor' => '1975-05-10',
                'agama_pelapor' => 'Islam',
                'no_whatsapp' => '081234567893',
                'status' => 'pending',
                'verifikasi' => 'belum-verifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        DB::table('sk_kematian')->insert($data);
    }
}
