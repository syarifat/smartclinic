@extends('layouts.app')
@section('content')
<h2 class="text-xl font-bold mb-4">Detail Pembayaran & Kwitansi</h2>
<div class="mb-4 p-4 bg-blue-50 rounded">
    <div><b>Nama Pasien:</b> {{ $kunjungan->pasien->nama }}</div>
    <div><b>Nomor Kartu:</b> {{ $kunjungan->pasien->nomor_kartu }}</div>
    <div><b>Tanggal Kunjungan:</b> {{ $kunjungan->tanggal_kunjungan }}</div>
    <div><b>Dokter:</b> {{ $kunjungan->dokter->nama_lengkap ?? '-' }}</div>
</div>
<h3 class="font-semibold mb-2">Rincian Biaya:</h3>
<table class="min-w-full border mb-4">
    <tbody>
        <tr><td class="p-2 border">Biaya Konsultasi</td><td class="p-2 border text-right">Rp{{ number_format($biaya_konsultasi) }}</td></tr>
        <tr><td class="p-2 border">Biaya Tindakan</td><td class="p-2 border text-right">Rp{{ number_format($biaya_tindakan) }}</td></tr>
        <tr><td class="p-2 border">Biaya Obat</td><td class="p-2 border text-right">Rp{{ number_format($biaya_obat) }}</td></tr>
        <tr class="font-bold"><td class="p-2 border">Total Bayar</td><td class="p-2 border text-right">Rp{{ number_format($total_bayar) }}</td></tr>
    </tbody>
</table>
<form method="POST" action="{{ route('pembayaran.store', $kunjungan->id_kunjungan) }}" class="max-w-lg bg-white p-6 rounded shadow">
    @csrf
    <div class="mb-3">
        <label class="block mb-1">Metode Pembayaran</label>
        <select name="metode_bayar" class="border rounded px-3 py-2 w-full" required>
            <option value="">- Pilih Metode -</option>
            <option value="tunai">Tunai</option>
            <option value="transfer">Transfer</option>
            <option value="e-wallet">E-Wallet</option>
        </select>
    </div>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Bayar & Cetak Kwitansi</button>
    <a href="{{ route('pembayaran.index') }}" class="ml-2 text-blue-600">Kembali</a>
</form>
@endsection
