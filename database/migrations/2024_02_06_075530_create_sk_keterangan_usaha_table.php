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
        Schema::create('sk_keterangan_usaha', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->enum('status_perkawinan', ['menikah', 'belum menikah']);
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
        Schema::dropIfExists('sk_keterangan_usaha');
    }
};
