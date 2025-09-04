<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\RekamMedis;
use App\Models\Tindakan;
use App\Models\RekamMedisTindakan;

class RekamMedisController extends Controller
{
    // Daftar pasien menunggu pemeriksaan dokter
    public function index()
    {
        $kunjungans = Kunjungan::where('status', 'menunggu_dokter')->with('pasien')->orderBy('tanggal_kunjungan')->get();
        return view('pemeriksaan.index', compact('kunjungans'));
    }

    // Form input rekam medis
    public function create($kunjungan)
    {
        $kunjungan = Kunjungan::with('pasien')->findOrFail($kunjungan);
        $tindakans = Tindakan::all();
        return view('pemeriksaan.input', compact('kunjungan', 'tindakans'));
    }

    // Simpan rekam medis dan tindakan
    public function store(Request $request, $kunjungan)
    {
        $validated = $request->validate([
            'diagnosa' => 'required',
            'catatan_dokter' => 'nullable',
            'tindakan' => 'array',
            'tindakan.*' => 'exists:tindakans,id_tindakan',
        ]);
        $rekam = RekamMedis::create([
            'id_kunjungan' => $kunjungan,
            'diagnosa' => $validated['diagnosa'],
            'catatan_dokter' => $validated['catatan_dokter'] ?? null,
        ]);
        if (!empty($validated['tindakan'])) {
            foreach ($validated['tindakan'] as $id_tindakan) {
                RekamMedisTindakan::create([
                    'id_rekam' => $rekam->id_rekam,
                    'id_tindakan' => $id_tindakan,
                ]);
            }
        }
        // Update status kunjungan
        $kunjunganObj = Kunjungan::findOrFail($kunjungan);
        $kunjunganObj->status = 'menunggu_obat';
        $kunjunganObj->save();
        return redirect()->route('pemeriksaan.index')->with('success', 'Rekam medis berhasil disimpan!');
    }
}
