<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sk_keterangan_ahli_waris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->date('tanggal_meninggal');
            $table->string('nama_meninggal');
            $table->string('jenis_kelamin_meninggal');
            $table->string('umur_meninggal');
            $table->string('hubungan_dalam_keluarga');
            $table->string('no_whatsapp');
            $table->enum('status', ['ter-acc', 'pending', 'ditolak'])->default('pending');
            $table->enum('verifikasi', ['ter-verifikasi', 'belum-verifikasi'])->default('belum-verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk_keterangan_ahli_waris');
    }
};
