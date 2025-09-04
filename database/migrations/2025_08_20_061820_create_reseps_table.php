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
        Schema::create('reseps', function (Blueprint $table) {
            $table->bigIncrements('id_resep');
            $table->unsignedBigInteger('id_kunjungan');
            $table->unsignedBigInteger('id_obat');
            $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungans');
            $table->foreign('id_obat')->references('id_obat')->on('obats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
