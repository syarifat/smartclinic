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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->bigIncrements('id_pasien');
            $table->string('nomor_kartu')->unique();
            $table->string('nama');
            $table->string('nik', 20)->nullable();
            $table->integer('umur');
            $table->string('alamat');
            $table->string('telp', 20)->nullable();
            $table->text('riwayat_penyakit')->nullable();
            $table->string('golongan_darah', 5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
