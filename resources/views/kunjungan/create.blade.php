@extends('layouts.app')
@section('content')
<h2 class="text-xl font-bold mb-4">Kunjungan Baru</h2>
<form method="POST" action="{{ route('kunjungan.store') }}" class="max-w-lg bg-white p-6 rounded shadow">
    @csrf
    <div class="mb-3">
        <label class="block mb-1">Pasien</label>
        <select name="id_pasien" class="border rounded px-3 py-2 w-full" required>
            <option value="">- Pilih Pasien -</option>
            @foreach($pasiens as $pasien)
                <option value="{{ $pasien->id_pasien }}">{{ $pasien->nomor_kartu }} - {{ $pasien->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="block mb-1">Dokter Tujuan</label>
        <select name="id_dokter" class="border rounded px-3 py-2 w-full" required>
            <option value="">- Pilih Dokter -</option>
            @foreach($dokters as $dokter)
                <option value="{{ $dokter->id_user }}">{{ $dokter->nama_lengkap }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="block mb-1">Tanggal Kunjungan</label>
        <input type="date" name="tanggal_kunjungan" class="border rounded px-3 py-2 w-full" value="{{ date('Y-m-d') }}" required />
    </div>
    <div class="mb-3">
        <label class="block mb-1">Keluhan</label>
        <textarea name="keluhan" class="border rounded px-3 py-2 w-full"></textarea>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    <a href="{{ route('kunjungan.index') }}" class="ml-2 text-blue-600">Batal</a>
</form>
@endsection
