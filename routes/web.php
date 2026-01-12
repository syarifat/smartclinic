<?php

use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KunjunganController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ApotekController;

Route::get('/', function () {
    return view('welcome');
});

// Pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index'); // daftar & cari pasien
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create'); // form tambah pasien
Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store'); // simpan pasien baru

// Kunjungan
Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan.index');
Route::get('/kunjungan/create', [KunjunganController::class, 'create'])->name('kunjungan.create');
Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');

// Pemeriksaan Dokter
Route::get('/pemeriksaan', [RekamMedisController::class, 'index'])->name('pemeriksaan.index'); // daftar pasien menunggu
Route::get('/pemeriksaan/{kunjungan}/input', [RekamMedisController::class, 'create'])->name('pemeriksaan.input'); // form input rekam medis
Route::post('/pemeriksaan/{kunjungan}', [RekamMedisController::class, 'store'])->name('pemeriksaan.store'); // simpan rekam medis

// Resep
Route::get('/resep/{kunjungan}', [ResepController::class, 'create'])->name('resep.create'); // form input resep
Route::post('/resep/{kunjungan}', [ResepController::class, 'store'])->name('resep.store'); // simpan resep

// Apotek
Route::get('/apotek', [ApotekController::class, 'index'])->name('apotek.index'); // daftar resep pasien menunggu obat
Route::get('/apotek/{kunjungan}', [ApotekController::class, 'show'])->name('apotek.show'); // detail resep dan proses serah obat
Route::post('/apotek/{kunjungan}/serah', [ApotekController::class, 'serahObat'])->name('apotek.serah'); // proses serah obat dan update stok

// Kasir
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index'); // daftar kunjungan menunggu bayar
Route::get('/pembayaran/{kunjungan}', [PembayaranController::class, 'show'])->name('pembayaran.show'); // detail pembayaran
Route::post('/pembayaran/{kunjungan}', [PembayaranController::class, 'store'])->name('pembayaran.store'); // proses pembayaran

// Cetak Kwitansi
Route::get('/kwitansi', [PembayaranController::class, 'riwayatKwitansi'])->name('kwitansi.riwayat'); // daftar riwayat kwitansi
Route::get('/kwitansi/{kunjungan}', [PembayaranController::class, 'kwitansi'])->name('kwitansi.cetak');

// Dashboard
Route::get('/dashboard', function () {
    $totalPasien = \App\Models\Pasien::count();
    $kunjunganHariIni = \App\Models\Kunjungan::whereDate('tanggal_kunjungan', now())->count();
    $pembayaranHariIni = \App\Models\Pembayaran::whereDate('tanggal_bayar', now())->sum('total_bayar');
    $obatTerendah = \App\Models\Obat::orderBy('stok')->first();
    return view('dashboard', compact('totalPasien', 'kunjunganHariIni', 'pembayaranHariIni', 'obatTerendah'));
})->name('dashboard');
