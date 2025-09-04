@extends('layouts.app')
@section('content')
<h2 class="text-xl font-bold mb-4">Detail Resep & Serah Obat</h2>
<div class="mb-4 p-4 bg-blue-50 rounded">
    <div><b>Nama Pasien:</b> {{ $kunjungan->pasien->nama }}</div>
    <div><b>Nomor Kartu:</b> {{ $kunjungan->pasien->nomor_kartu }}</div>
    <div><b>Tanggal Kunjungan:</b> {{ $kunjungan->tanggal_kunjungan }}</div>
</div>
<h3 class="font-semibold mb-2">Resep Obat:</h3>
<table class="min-w-full border mb-4">
    <thead class="bg-blue-100">
        <tr>
            <th class="p-2 border">Nama Obat</th>
            <th class="p-2 border">Jumlah</th>
            <th class="p-2 border">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kunjungan->resep as $resep)
        <tr>
            <td class="p-2 border">{{ $resep->obat->nama_obat ?? '-' }}</td>
            <td class="p-2 border">{{ $resep->jumlah }}</td>
            <td class="p-2 border">{{ $resep->keterangan }}</td>
        </tr>
        @empty
        <tr><td colspan="3" class="p-2 border text-center">Tidak ada resep</td></tr>
        @endforelse
    </tbody>
</table>
<form method="POST" action="{{ route('apotek.serah', $kunjungan->id_kunjungan) }}">
    @csrf
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Serahkan Obat & Update Stok</button>
    <a href="{{ route('apotek.index') }}" class="ml-2 text-blue-600">Kembali</a>
</form>
@endsection
