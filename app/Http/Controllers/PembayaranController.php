<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\RekamMedisTindakan;
use App\Models\Resep;
use App\Models\Pembayaran;
use App\Models\Tindakan;
use App\Models\Obat;

class PembayaranController extends Controller
{
    // Daftar riwayat kwitansi (pembayaran yang sudah selesai)
    public function riwayatKwitansi()
    {
        $pembayarans = Pembayaran::with(['kunjungan.pasien', 'kunjungan.dokter'])->orderByDesc('tanggal_bayar')->get();
        return view('pembayaran.riwayat_kwitansi', compact('pembayarans'));
    }
    // Cetak kwitansi pembayaran
    public function kwitansi($kunjungan)
    {
        $kunjungan = Kunjungan::with(['pasien', 'dokter', 'resep'])->findOrFail($kunjungan);
        $pembayaran = Pembayaran::where('id_kunjungan', $kunjungan)->first();
        // Hitung biaya jika belum ada pembayaran
        $biaya_konsultasi = $pembayaran->biaya_konsultasi ?? 50000;
        $biaya_tindakan = $pembayaran->biaya_tindakan ?? 0;
        $biaya_obat = $pembayaran->biaya_obat ?? 0;
        $total_bayar = $pembayaran->total_bayar ?? ($biaya_konsultasi + $biaya_tindakan + $biaya_obat);
        $metode_bayar = $pembayaran->metode_bayar ?? '-';
        $tanggal_bayar = $pembayaran->tanggal_bayar ?? now()->format('Y-m-d');
        return view('pembayaran.kwitansi', compact('kunjungan', 'pembayaran', 'biaya_konsultasi', 'biaya_tindakan', 'biaya_obat', 'total_bayar', 'metode_bayar', 'tanggal_bayar'));
    }
    // Daftar kunjungan menunggu bayar
    public function index()
    {
        $kunjungans = Kunjungan::where('status', 'menunggu_bayar')->with('pasien')->get();
        return view('pembayaran.index', compact('kunjungans'));
    }

    // Detail pembayaran
    public function show($kunjungan)
    {
        $kunjungan = Kunjungan::with(['pasien', 'resep', 'dokter'])->findOrFail($kunjungan);
        // Hitung biaya konsultasi
        $biaya_konsultasi = 50000;
        // Hitung biaya tindakan
        $tindakanIds = RekamMedisTindakan::whereHas('rekamMedis', function($q) use ($kunjungan) {
            $q->where('id_kunjungan', $kunjungan);
        })->pluck('id_tindakan');
        $biaya_tindakan = Tindakan::whereIn('id_tindakan', $tindakanIds)->sum('harga');
        // Hitung biaya obat
        $biaya_obat = 0;
        foreach ($kunjungan->resep as $resep) {
            $obat = Obat::find($resep->id_obat);
            $biaya_obat += ($obat ? $obat->harga : 0) * $resep->jumlah;
        }
        $total_bayar = $biaya_konsultasi + $biaya_tindakan + $biaya_obat;
        return view('pembayaran.show', compact('kunjungan', 'biaya_konsultasi', 'biaya_tindakan', 'biaya_obat', 'total_bayar'));
    }

    // Proses pembayaran
    public function store(Request $request, $kunjungan)
    {
        $validated = $request->validate([
            'metode_bayar' => 'required|in:tunai,transfer,e-wallet',
        ]);
        $kunjunganObj = Kunjungan::findOrFail($kunjungan);
        // Hitung biaya
        $biaya_konsultasi = 50000;
        $tindakanIds = RekamMedisTindakan::whereHas('rekamMedis', function($q) use ($kunjungan) {
            $q->where('id_kunjungan', $kunjungan);
        })->pluck('id_tindakan');
        $biaya_tindakan = Tindakan::whereIn('id_tindakan', $tindakanIds)->sum('harga');
        $biaya_obat = 0;
        foreach (Resep::where('id_kunjungan', $kunjungan)->get() as $resep) {
            $obat = Obat::find($resep->id_obat);
            $biaya_obat += ($obat ? $obat->harga : 0) * $resep->jumlah;
        }
        $total_bayar = $biaya_konsultasi + $biaya_tindakan + $biaya_obat;
        // Simpan pembayaran
        Pembayaran::create([
            'id_kunjungan' => $kunjungan,
            'biaya_konsultasi' => $biaya_konsultasi,
            'biaya_tindakan' => $biaya_tindakan,
            'biaya_obat' => $biaya_obat,
            'total_bayar' => $total_bayar,
            'metode_bayar' => $validated['metode_bayar'],
            'tanggal_bayar' => now()->format('Y-m-d'),
        ]);
        $kunjunganObj->status = 'selesai';
        $kunjunganObj->save();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil!');
    }
}
