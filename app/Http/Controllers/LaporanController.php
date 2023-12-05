<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Simpanan;
use App\Models\Pinjamans;
use App\Models\Cicilan;
use PDF;

class LaporanController extends Controller
{
    // public function cetakLaporan(Request $request)
    // {
    //     // Logic untuk mengambil data sisa hasil usaha dari database
    //     $dataSisaHasilUsaha = SisaHasilUsaha::All();// Lakukan query atau pengolahan data sesuai kebutuhan

    //     // Load view laporan.blade.php dengan data sisa hasil usaha
    //     $pdf = PDF::loadView('laporan.laporan', compact('dataSisaHasilUsaha'));

    //     // Cetak atau unduh PDF laporan
    //     return $pdf->stream('laporan_sisa_hasil_usaha.pdf');
    // }

    public function cetakuser()
    {
        $datauser = User::get();

        // $pdf = PDF::loadView('laporan.laporan_anggota', compact('datauser'));
        // return $pdf->stream('Laporan-User.pdf');
        return view('laporan.laporan_anggota', compact('datauser'));
    }
    public function cetaksimpanan()
    {
        $datasimpanan = Simpanan::get();

        // $pdf = PDF::loadview('laporan.laporan_simpanan', compact('datasimpanan'));
        return view('laporan.laporan_simpanan', compact('datasimpanan'));
    }
    public function cetakpinjaman()
    {
        $datapinjaman = Pinjamans::get();

        // $pdf = PDF::loadview('laporan.laporan_pinjaman', compact('datapinjaman'));
        // return $pdf->stream('Laporan-Pinjaman.pdf');
        return view('laporan.laporan_pinjaman', compact('datapinjaman'));
    }
    public function cetakcicilan()
    {
        $datacicilan = Cicilan::get();

        // $pdf = PDF::loadview('laporan.laporan_cicilan', compact('datacicilan'));
        // return $pdf->stream('Laporan-Cicilan.pdf');
        return view('laporan.laporan_cicilan', compact('datacicilan'));
    }

    public function laporan_shu(Request $request)
    {
        if ($request->tahun) {
            //total simpanan
            $totalSimpanan = Simpanan::whereYear('tanggal', $request->tahun)->sum('nominal');
            $totalPinjaman = Pinjamans::whereYear('tanggal', $request->tahun)->sum('nominal');
            //bunga yg di dapat dari pinjaman
            $cicilan = Cicilan::whereYear('tanggal_pembayaran', $request->tahun)->get();
            $bungaCicilan = 0;
            foreach ($cicilan as $c) {
                $bungaCicilan += ($c->bunga * $c->total);
            }
            $totalPendapatanTahunan = $totalSimpanan + $bungaCicilan;

            //data anggota
            $anggota = User::where('role', 'anggota')->get();
            //hitung total pendapatan untuk masing-masing anggota
            $data = [];
            foreach ($anggota as $key => $a) {
                $data[$key] = [
                    'nama'          => $a->nama,
                    'nip'           => $a->nip,
                    'no_hp'         => $a->no_hp,
                    'simpanan'      => Simpanan::whereYear('tanggal', $request->tahun)
                        ->where('user_id', $a->id)->sum('nominal'),
                    'pinjaman'      => Pinjamans::whereYear('tanggal', $request->tahun)
                        ->where('user_id', $a->id)->sum('nominal'),
                    'shu_simpanan'  => $totalSimpanan <= 0 ? 0 : (Simpanan::whereYear('tanggal', $request->tahun)
                        ->where('user_id', $a->id)->sum('nominal') * (0.3 * $totalPendapatanTahunan)) / $totalSimpanan,
                    'shu_transaksi' => $totalPinjaman <= 0 ? 0 : (Pinjamans::whereYear('tanggal', $request->tahun)
                        ->where('user_id', $a->id)->sum('nominal') * (0.7 * $totalPendapatanTahunan)) / $totalPinjaman
                ];
                $data[$key]['jumlah_pendapatan'] = $data[$key]['shu_simpanan'] + $data[$key]['shu_transaksi'];
            }
            return view('laporan.laporan_shu_tahunan', compact('data', 'totalPendapatanTahunan'));
        }
        return view('laporan.laporan_shu_tahunan');
    }

    public function cetak_laporan_shu($tahun)
    {
        //total simpanan
        $totalSimpanan = Simpanan::whereYear('tanggal', $tahun)->sum('nominal');
        $totalPinjaman = Pinjamans::whereYear('tanggal', $tahun)->sum('nominal');
        //bunga yg di dapat dari pinjaman
        $cicilan = Cicilan::whereYear('tanggal_pembayaran', $tahun)->get();
        $bungaCicilan = 0;
        foreach ($cicilan as $c) {
            $bungaCicilan += ($c->bunga * $c->total);
        }
        $totalPendapatanTahunan = $totalSimpanan + $bungaCicilan;

        //data anggota
        $anggota = User::where('role', 'anggota')->get();
        //hitung total pendapatan untuk masing-masing anggota
        $data = [];
        foreach ($anggota as $key => $a) {
            $data[$key] = [
                'nama'          => $a->nama,
                'nip'           => $a->nip,
                'no_hp'         => $a->no_hp,
                'simpanan'      => Simpanan::whereYear('tanggal', $tahun)
                    ->where('user_id', $a->id)->sum('nominal'),
                'pinjaman'      => Pinjamans::whereYear('tanggal', $tahun)
                    ->where('user_id', $a->id)->sum('nominal'),
                'shu_simpanan'  => $totalSimpanan <= 0 ? 0 : (Simpanan::whereYear('tanggal', $tahun)
                    ->where('user_id', $a->id)->sum('nominal') * (0.3 * $totalPendapatanTahunan)) / $totalSimpanan,
                'shu_transaksi' => $totalPinjaman <= 0 ? 0 : (Pinjamans::whereYear('tanggal', $tahun)
                    ->where('user_id', $a->id)->sum('nominal') * (0.7 * $totalPendapatanTahunan)) / $totalPinjaman
            ];
            $data[$key]['jumlah_pendapatan'] = round($data[$key]['shu_simpanan'] + $data[$key]['shu_transaksi']);
        }
        return view('laporan.laporan_shu_tahunan_cetak', compact('tahun', 'data', 'totalPendapatanTahunan'));
    }
}
