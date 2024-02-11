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
        Schema::create('sk_kelakuan_baik', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('agama');
            $table->string('status');
            $table->string('dusun_tinggal');
            $table->string('rt/rw');
            $table->string('no_whatsapp');
            $table->enum('status-surat', ['ter-acc', 'pending', 'ditolak'])->default('pending');
            $table->enum('verifikasi', ['ter-verifikasi', 'belum-verifikasi'])->default('belum-verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk_kelakuan_baik');
    }
};
