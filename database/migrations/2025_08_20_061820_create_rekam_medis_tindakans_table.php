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
        Schema::create('rekam_medis_tindakans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_rekam');
            $table->unsignedBigInteger('id_tindakan');
            $table->integer('jumlah')->nullable();
            $table->timestamps();
            $table->foreign('id_rekam')->references('id_rekam')->on('rekam_medis');
            $table->foreign('id_tindakan')->references('id_tindakan')->on('tindakans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis_tindakans');
    }
};
