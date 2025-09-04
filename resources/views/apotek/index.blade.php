@extends('layouts.app')
@section('content')
<h2 class="text-xl font-bold mb-4">Daftar Resep Pasien Menunggu Obat</h2>
@if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
@endif
<div class="overflow-x-auto">
<table class="min-w-full border">
    <thead class="bg-blue-100">
        <tr>
            <th class="p-2 border">Tanggal Kunjungan</th>
            <th class="p-2 border">Nomor Kartu</th>
            <th class="p-2 border">Nama Pasien</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kunjungans as $kunjungan)
        <tr>
            <td class="p-2 border">{{ $kunjungan->tanggal_kunjungan }}</td>
            <td class="p-2 border">{{ $kunjungan->pasien->nomor_kartu ?? '-' }}</td>
            <td class="p-2 border">{{ $kunjungan->pasien->nama ?? '-' }}</td>
            <td class="p-2 border">
                <a href="{{ route('apotek.show', $kunjungan->id_kunjungan) }}" class="bg-blue-600 text-white px-3 py-1 rounded">Detail & Serah Obat</a>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="p-2 border text-center">Tidak ada pasien menunggu obat</td></tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
