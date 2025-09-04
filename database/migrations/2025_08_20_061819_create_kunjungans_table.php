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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->bigIncrements('id_kunjungan');
            $table->unsignedBigInteger('id_pasien');
            $table->date('tanggal_kunjungan');
            $table->unsignedBigInteger('id_dokter');
            $table->text('keluhan')->nullable();
            $table->enum('status', ['menunggu_dokter', 'menunggu_obat', 'menunggu_bayar', 'selesai']);
            $table->timestamps();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasiens');
            $table->foreign('id_dokter')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
