@extends('layouts.app')
@section('content')
<h2 class="text-xl font-bold mb-4">Registrasi Pasien Baru</h2>
<form method="POST" action="{{ route('pasien.store') }}" class="max-w-lg bg-white p-6 rounded shadow">
    @csrf
    <div class="mb-3">
        <label class="block mb-1">Nama</label>
        <input type="text" name="nama" class="border rounded px-3 py-2 w-full" required />
    </div>
    <div class="mb-3">
        <label class="block mb-1">NIK</label>
        <input type="text" name="nik" class="border rounded px-3 py-2 w-full" />
    </div>
    <div class="mb-3">
        <label class="block mb-1">Umur</label>
        <input type="number" name="umur" class="border rounded px-3 py-2 w-full" required />
    </div>
    <div class="mb-3">
        <label class="block mb-1">Alamat</label>
        <input type="text" name="alamat" class="border rounded px-3 py-2 w-full" required />
    </div>
    <div class="mb-3">
        <label class="block mb-1">Telp</label>
        <input type="text" name="telp" class="border rounded px-3 py-2 w-full" />
    </div>
    <div class="mb-3">
        <label class="block mb-1">Riwayat Penyakit</label>
        <textarea name="riwayat_penyakit" class="border rounded px-3 py-2 w-full"></textarea>
    </div>
    <div class="mb-3">
        <label class="block mb-1">Golongan Darah</label>
        <input type="text" name="golongan_darah" class="border rounded px-3 py-2 w-full" />
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    <a href="{{ route('pasien.index') }}" class="ml-2 text-blue-600">Batal</a>
</form>
@endsection
