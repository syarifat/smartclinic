@extends('layouts.app')
@section('content')
<h2 class="text-xl font-bold mb-4">Daftar Kunjungan</h2>
@if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
@endif
<a href="{{ route('kunjungan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Kunjungan Baru</a>
<div class="overflow-x-auto">
<table class="min-w-full border">
    <thead class="bg-blue-100">
        <tr>
            <th class="p-2 border">Tanggal</th>
            <th class="p-2 border">Pasien</th>
            <th class="p-2 border">Dokter</th>
            <th class="p-2 border">Keluhan</th>
            <th class="p-2 border">Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kunjungans as $kunjungan)
        <tr>
            <td class="p-2 border">{{ $kunjungan->tanggal_kunjungan }}</td>
            <td class="p-2 border">{{ $kunjungan->pasien->nama ?? '-' }}</td>
            <td class="p-2 border">{{ $kunjungan->dokter->nama_lengkap ?? '-' }}</td>
            <td class="p-2 border">{{ $kunjungan->keluhan }}</td>
            <td class="p-2 border">{{ ucfirst(str_replace('_', ' ', $kunjungan->status)) }}</td>
        </tr>
        @empty
        <tr><td colspan="5" class="p-2 border text-center">Belum ada kunjungan</td></tr>
        @endforelse
    </tbody>
</table>
</div>
<div class="mt-4">{{ $kunjungans->links() }}</div>
@endsection
