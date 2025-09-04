@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded p-6 mt-8">
    <h2 class="text-2xl font-bold mb-4 text-center">Kwitansi Pembayaran</h2>
    <div class="mb-2 flex justify-between">
        <span>Nama Pasien:</span>
        <span>{{ $kunjungan->pasien->nama ?? '-' }}</span>
    </div>
    <div class="mb-2 flex justify-between">
        <span>Dokter:</span>
        <span>{{ $kunjungan->dokter->nama ?? '-' }}</span>
    </div>
    <div class="mb-2 flex justify-between">
        <span>Tanggal Bayar:</span>
        <span>{{ $tanggal_bayar }}</span>
    </div>
    <hr class="my-4">
    <div class="mb-2 flex justify-between">
        <span>Biaya Konsultasi:</span>
        <span>Rp {{ number_format($biaya_konsultasi,0,',','.') }}</span>
    </div>
    <div class="mb-2 flex justify-between">
        <span>Biaya Tindakan:</span>
        <span>Rp {{ number_format($biaya_tindakan,0,',','.') }}</span>
    </div>
    <div class="mb-2 flex justify-between">
        <span>Biaya Obat:</span>
        <span>Rp {{ number_format($biaya_obat,0,',','.') }}</span>
    </div>
    <hr class="my-4">
    <div class="mb-2 flex justify-between font-bold text-lg">
        <span>Total Bayar:</span>
        <span>Rp {{ number_format($total_bayar,0,',','.') }}</span>
    </div>
    <div class="mb-2 flex justify-between">
        <span>Metode Bayar:</span>
        <span>{{ $metode_bayar }}</span>
    </div>
    <div class="mt-6 text-center">
        <button onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cetak Kwitansi</button>
    </div>
</div>
@endsection
