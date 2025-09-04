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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->bigIncrements('id_rekam');
            $table->unsignedBigInteger('id_kunjungan');
            $table->text('diagnosa')->nullable();
            $table->text('catatan_dokter')->nullable();
            $table->timestamps();
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
