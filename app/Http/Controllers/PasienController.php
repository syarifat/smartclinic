<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    //
        // Daftar & cari pasien
        public function index(Request $request)
        {
            $query = $request->input('q');
            $pasiens = Pasien::when($query, function($q) use ($query) {
                $q->where('nomor_kartu', 'like', "%$query%")
                  ->orWhere('nama', 'like', "%$query%") ;
            })->paginate(10);
            return view('pasien.index', compact('pasiens', 'query'));
        }

        // Form tambah pasien
        public function create()
        {
            return view('pasien.create');
        }

        // Simpan pasien baru
        public function store(Request $request)
        {
            $validated = $request->validate([
                'nama' => 'required',
                'nik' => 'nullable',
                'umur' => 'required|integer',
                'alamat' => 'required',
                'telp' => 'nullable',
                'riwayat_penyakit' => 'nullable',
                'golongan_darah' => 'nullable',
            ]);
            // Generate nomor kartu otomatis
            $last = Pasien::orderByDesc('id_pasien')->first();
            $nextId = $last ? $last->id_pasien + 1 : 1;
            $nomor_kartu = 'P' . str_pad($nextId, 6, '0', STR_PAD_LEFT);
            $pasien = Pasien::create(array_merge($validated, [
                'nomor_kartu' => $nomor_kartu
            ]));
            return redirect()->route('pasien.index')->with('success', 'Pasien berhasil didaftarkan!');
        }
}
