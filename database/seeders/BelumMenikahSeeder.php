<?php

namespace Database\Seeders;

use App\Models\SK_BelumMenikah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BelumMenikahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skBelumMenikahs = [
            [
                'nama' => 'Nama 1',
                'nik' => '1234567890123456',
                'tempat_lahir' => 'Tempat Lahir 1',
                'tanggal_lahir' => '2000-01-01',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Alamat 1',
                'status' => 'ter-acc',
                'no_whatsapp' => '085712312312',
                'verifikasi' => 'ter-verifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Nama 2',
                'nik' => '1234567890123457',
                'tempat_lahir' => 'Tempat Lahir 2',
                'tanggal_lahir' => '2000-02-02',
                'jenis_kelamin' => 'perempuan',
                'alamat' => 'Alamat 2',
                'status' => 'pending',
                'no_whatsapp' => '085712312312',
                'verifikasi' => 'belum-verifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data sesuai kebutuhan Anda
        ];

        foreach ($skBelumMenikahs as $skBelumMenikah) {
            SK_BelumMenikah::create($skBelumMenikah);
        }
    }
}
