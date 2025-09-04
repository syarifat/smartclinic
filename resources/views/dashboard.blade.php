@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard SmartKlinik</h1>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-blue-100 rounded p-4">
            <div class="text-sm text-gray-500">Total Pasien</div>
            <div class="text-2xl font-bold">{{ $totalPasien }}</div>
        </div>
        <div class="bg-green-100 rounded p-4">
            <div class="text-sm text-gray-500">Kunjungan Hari Ini</div>
            <div class="text-2xl font-bold">{{ $kunjunganHariIni }}</div>
        </div>
        <div class="bg-yellow-100 rounded p-4">
            <div class="text-sm text-gray-500">Pembayaran Hari Ini</div>
            <div class="text-2xl font-bold">Rp {{ number_format($pembayaranHariIni,0,',','.') }}</div>
        </div>
        <div class="bg-red-100 rounded p-4">
            <div class="text-sm text-gray-500">Stok Obat Terendah</div>
            <div class="text-2xl font-bold">{{ $obatTerendah ? $obatTerendah->nama_obat : '-' }}</div>
            <div class="text-xs text-gray-600">Stok: {{ $obatTerendah ? $obatTerendah->stok : '-' }}</div>
        </div>
    </div>
</div>
@endsection