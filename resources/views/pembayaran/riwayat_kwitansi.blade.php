@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded p-6 mt-8">
    <h2 class="text-2xl font-bold mb-4 text-center">Riwayat Kwitansi Pembayaran</h2>
    <table class="min-w-full table-auto border">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-2">Tanggal Bayar</th>
                <th class="px-4 py-2">Nama Pasien</th>
                <th class="px-4 py-2">Dokter</th>
                <th class="px-4 py-2">Total Bayar</th>
                <th class="px-4 py-2">Metode</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pembayarans as $pembayaran)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $pembayaran->tanggal_bayar }}</td>
                <td class="px-4 py-2">{{ $pembayaran->kunjungan->pasien->nama ?? '-' }}</td>
                <td class="px-4 py-2">{{ $pembayaran->kunjungan->dokter->nama ?? '-' }}</td>
                <td class="px-4 py-2">Rp {{ number_format($pembayaran->total_bayar,0,',','.') }}</td>
                <td class="px-4 py-2">{{ $pembayaran->metode_bayar }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('kwitansi.cetak', ['kunjungan' => $pembayaran->id_kunjungan]) }}" target="_blank" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Cetak Ulang</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4">Belum ada pembayaran.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
