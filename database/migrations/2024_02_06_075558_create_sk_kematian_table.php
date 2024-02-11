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
        Schema::create('sk_kematian', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('alamat');
            $table->string('tanggal_meninggal');
            $table->string('jam_meninggal');
            $table->string('tempat_meninggal');
            $table->string('sebab_meninggal');
            $table->string('tempat_pemakaman');
            $table->string('nama_pelapor');
            $table->string('nik_pelapor');
            $table->string('hubungan_pelapor');
            $table->string('alamat_pelapor');
            $table->string('tempat_lahir_pelapor');
            $table->string('tanggal_lahir_pelapor');
            $table->string('agama_pelapor');
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
        Schema::dropIfExists('sk_kematian');
    }
};
