@extends('layouts.app')
@section('content')
<h2 class="text-xl font-bold mb-4">Input Resep Obat</h2>
<div class="mb-4 p-4 bg-blue-50 rounded">
    <div><b>Nama Pasien:</b> {{ $kunjungan->pasien->nama }}</div>
    <div><b>Nomor Kartu:</b> {{ $kunjungan->pasien->nomor_kartu }}</div>
    <div><b>Tanggal Kunjungan:</b> {{ $kunjungan->tanggal_kunjungan }}</div>
    <div><b>Diagnosa:</b> {{ $kunjungan->rekamMedis->diagnosa ?? '-' }}</div>
</div>
<form method="POST" action="{{ route('resep.store', $kunjungan->id_kunjungan) }}" class="max-w-lg bg-white p-6 rounded shadow">
    @csrf
    <div class="mb-3">
        <label class="block mb-1">Obat</label>
        <div class="space-y-2">
            @foreach($obats as $obat)
            <div class="flex gap-2 items-center">
                <input type="checkbox" name="obat[{{ $loop->index }}][id_obat]" value="{{ $obat->id_obat }}" />
                {{ $obat->nama_obat }} ({{ $obat->satuan }}) - Stok: {{ $obat->stok }} - Rp{{ number_format($obat->harga) }}
                <input type="number" name="obat[{{ $loop->index }}][jumlah]" min="1" placeholder="Jumlah" class="border rounded px-2 py-1 w-20 ml-2" />
                <input type="text" name="obat[{{ $loop->index }}][keterangan]" placeholder="Keterangan" class="border rounded px-2 py-1 w-32 ml-2" />
            </div>
            @endforeach
        </div>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Resep</button>
    <a href="{{ route('pemeriksaan.index') }}" class="ml-2 text-blue-600">Batal</a>
</form>
@endsection
