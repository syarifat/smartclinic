@extends('layouts.app')
@section('content')
<h2 class="text-xl font-bold mb-4">Input Rekam Medis</h2>
<div class="mb-4 p-4 bg-blue-50 rounded">
    <div><b>Nama Pasien:</b> {{ $kunjungan->pasien->nama }}</div>
    <div><b>Nomor Kartu:</b> {{ $kunjungan->pasien->nomor_kartu }}</div>
    <div><b>Tanggal Kunjungan:</b> {{ $kunjungan->tanggal_kunjungan }}</div>
    <div><b>Keluhan:</b> {{ $kunjungan->keluhan }}</div>
</div>
<form method="POST" action="{{ route('pemeriksaan.store', $kunjungan->id_kunjungan) }}" class="max-w-lg bg-white p-6 rounded shadow">
    @csrf
    <div class="mb-3">
        <label class="block mb-1">Diagnosa</label>
        <input type="text" name="diagnosa" class="border rounded px-3 py-2 w-full" required />
    </div>
    <div class="mb-3">
        <label class="block mb-1">Catatan Dokter</label>
        <textarea name="catatan_dokter" class="border rounded px-3 py-2 w-full"></textarea>
    </div>
    <div class="mb-3">
        <label class="block mb-1">Tindakan</label>
        <div class="space-y-2">
            @foreach($tindakans as $tindakan)
            <label class="flex items-center gap-2">
                <input type="checkbox" name="tindakan[]" value="{{ $tindakan->id_tindakan }}" />
                {{ $tindakan->nama_tindakan }} (Rp{{ number_format($tindakan->harga) }})
            </label>
            @endforeach
        </div>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    <a href="{{ route('pemeriksaan.index') }}" class="ml-2 text-blue-600">Batal</a>
</form>
@endsection
