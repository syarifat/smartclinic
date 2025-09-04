<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\User;

class KunjunganController extends Controller
{
    // Daftar kunjungan
    public function index()
    {
        $kunjungans = Kunjungan::with(['pasien', 'dokter'])->orderByDesc('tanggal_kunjungan')->paginate(10);
        return view('kunjungan.index', compact('kunjungans'));
    }

    // Form kunjungan baru
    public function create()
    {
        $pasiens = Pasien::orderBy('nama')->get();
        $dokters = User::where('role', 'dokter')->orderBy('nama_lengkap')->get();
        return view('kunjungan.create', compact('pasiens', 'dokters'));
    }

    // Simpan kunjungan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pasien' => 'required|exists:pasiens,id_pasien',
            'id_dokter' => 'required|exists:users,id_user',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'nullable',
        ]);
        $kunjungan = Kunjungan::create(array_merge($validated, [
            'status' => 'menunggu_dokter'
        ]));
        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan baru berhasil dibuat!');
    }
}
