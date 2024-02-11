<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelakuanBaikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Jane Doe',
                'nik' => '1234567890123457',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1995-05-15',
                'jenis_kelamin' => 'perempuan',
                'agama' => 'Islam',
                'status' => 'Belum Menikah',
                'dusun_tinggal' => 'Dusun Contoh',
                'rt/rw' => '001/002',
                'no_whatsapp' => '081234567891',
                'status-surat' => 'pending',
                'verifikasi' => 'belum-verifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        DB::table('sk_kelakuan_baik')->insert($data);
    }
}
