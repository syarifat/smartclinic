<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Obat;
use App\Models\Resep;

class ResepController extends Controller
{
    // Form input resep
    public function create($kunjungan)
    {
        $kunjungan = Kunjungan::with('pasien')->findOrFail($kunjungan);
        $obats = Obat::all();
        return view('resep.create', compact('kunjungan', 'obats'));
    }

    // Simpan resep
    public function store(Request $request, $kunjungan)
    {
        $validated = $request->validate([
            'obat' => 'array',
            'obat.*.id_obat' => 'required|exists:obats,id_obat',
            'obat.*.jumlah' => 'required|integer|min:1',
            'obat.*.keterangan' => 'nullable',
        ]);
        foreach ($validated['obat'] as $item) {
            Resep::create([
                'id_kunjungan' => $kunjungan,
                'id_obat' => $item['id_obat'],
                'jumlah' => $item['jumlah'],
                'keterangan' => $item['keterangan'] ?? null,
            ]);
        }
        // Update status kunjungan
        $kunjunganObj = Kunjungan::findOrFail($kunjungan);
        $kunjunganObj->status = 'menunggu_obat';
        $kunjunganObj->save();
        return redirect()->route('pemeriksaan.index')->with('success', 'Resep berhasil disimpan!');
    }
}
