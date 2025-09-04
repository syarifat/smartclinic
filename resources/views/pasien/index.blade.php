@extends('layouts.app')
@section('content')
<div class="mb-6 flex justify-between items-center">
    <form method="GET" action="" class="flex gap-2">
        <input type="text" name="q" value="{{ $query }}" placeholder="Cari nomor kartu/nama" class="border rounded px-3 py-2" />
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
    </form>
    <a href="{{ route('pasien.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">+ Pasien Baru</a>
</div>
@if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
@endif
<div class="overflow-x-auto">
<table class="min-w-full border">
    <thead class="bg-blue-100">
        <tr>
            <th class="p-2 border">Nomor Kartu</th>
            <th class="p-2 border">Nama</th>
            <th class="p-2 border">NIK</th>
            <th class="p-2 border">Umur</th>
            <th class="p-2 border">Alamat</th>
            <th class="p-2 border">Telp</th>
            <th class="p-2 border">Gol. Darah</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pasiens as $pasien)
        <tr>
            <td class="p-2 border">{{ $pasien->nomor_kartu }}</td>
            <td class="p-2 border">{{ $pasien->nama }}</td>
            <td class="p-2 border">{{ $pasien->nik }}</td>
            <td class="p-2 border">{{ $pasien->umur }}</td>
            <td class="p-2 border">{{ $pasien->alamat }}</td>
            <td class="p-2 border">{{ $pasien->telp }}</td>
            <td class="p-2 border">{{ $pasien->golongan_darah }}</td>
        </tr>
        @empty
        <tr><td colspan="7" class="p-2 border text-center">Tidak ada data pasien</td></tr>
        @endforelse
    </tbody>
</table>
</div>
<div class="mt-4">{{ $pasiens->links() }}</div>
@endsection
