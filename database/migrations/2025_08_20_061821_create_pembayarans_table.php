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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id_bayar');
            $table->unsignedBigInteger('id_kunjungan');
            $table->integer('biaya_konsultasi')->default(0);
            $table->integer('biaya_tindakan')->default(0);
            $table->integer('biaya_obat')->default(0);
            $table->integer('total_bayar')->default(0);
            $table->enum('metode_bayar', ['tunai', 'transfer', 'e-wallet']);
            $table->date('tanggal_bayar');
            $table->timestamps();
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
