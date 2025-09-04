<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Resep;
use App\Models\Obat;

class ApotekController extends Controller
{
    // Daftar resep pasien menunggu obat
    public function index()
    {
        $kunjungans = Kunjungan::where('status', 'menunggu_obat')->with('pasien')->get();
        return view('apotek.index', compact('kunjungans'));
    }

    // Detail resep dan proses serah obat
    public function show($kunjungan)
    {
        $kunjungan = Kunjungan::with(['pasien', 'resep'])->findOrFail($kunjungan);
        return view('apotek.show', compact('kunjungan'));
    }

    // Proses serah obat dan update stok
    public function serahObat(Request $request, $kunjungan)
    {
        $kunjungan = Kunjungan::with('resep')->findOrFail($kunjungan);
        foreach ($kunjungan->resep as $resep) {
            $obat = Obat::find($resep->id_obat);
            if ($obat && $obat->stok >= $resep->jumlah) {
                $obat->stok -= $resep->jumlah;
                $obat->save();
            }
        }
        $kunjungan->status = 'menunggu_bayar';
        $kunjungan->save();
        return redirect()->route('apotek.index')->with('success', 'Obat sudah diserahkan ke pasien dan stok terupdate!');
    }
}
