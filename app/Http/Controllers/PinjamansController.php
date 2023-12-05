<?php

namespace App\Http\Controllers;

use App\Models\Cicilan;
use App\Models\Pinjamans;
use App\Models\PenganjuanPinjamans;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PinjamansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        $id = Auth::user()->id;

        if ($role == 'admin') {
            $pinjamans = Pinjamans::query()->get();
        } else {
            $pinjamans = Pinjamans::where('user_id', $id)->get();
        }
        return view('pinjaman.index', [
            'pinjamans' => Pinjamans::with('PenganjuanPinjamans')->orderBy('tanggal', 'desc')->get(),
            'pinjamans' => $pinjamans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(PenganjuanPinjamans::doesntHave('pinjaman')->where('status', 'konfirmasi')->get());
        return view('pinjaman.create', [
            'pengajuan' => PenganjuanPinjamans::doesntHave('pinjaman')->where('status', 'konfirmasi')->get(),
            'pengajuanpinjamans' => PenganjuanPinjamans::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'pengajuan_id' => 'required',
            'total' => 'required',
        ]);
        $penganjuanpinjaman = PenganjuanPinjamans::find($request->pengajuan_id);
        Pinjamans::create([
            'user_id' => $penganjuanpinjaman->user_id,
            'pengajuan_id' => $request->pengajuan_id,
            'nominal' => $penganjuanpinjaman->nominal,
            'tanggal' => $request->tanggal,
            'bunga' => 0.1,
            'total' => $request->total,
            'status' => 'Belum Lunas'
        ]);
        return redirect('/pinjaman')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjamans  $pinjamans
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjamans $pinjamans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjamans  $pinjamans
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $pinjaman = Pinjamans::find($id );
        $penganjuanpinjaman = PenganjuanPinjamans::find($request->pengajuan_id);

        $user = User::find($id);
        return view('pinjaman.edit', [
            'pinjamans' => Pinjamans::find($id),
            'users' => User::all(),
            'pengajuanpinjamans' => PenganjuanPinjamans::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pinjamans  $pinjamans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nominal' => 'required',
            'tanggal' => 'required',
        ]);
        Pinjamans::where('id', $id)->update([
            'nominal' => $request->nominal,
            'total' => (0.1 * $request->nominal) + $request->nominal,
        ]);
        return redirect('/pinjaman')->with('pesan', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pinjamans  $pinjamans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjamans $pinjamans, $id)
    {
        Pinjamans::destroy($id);
        return redirect('/pinjaman')->with('pesan', 'Data Berhasil Dihapus');
    }

    public function history(Pinjamans $pinjaman)
    {
        $cicilan = Cicilan::where('pinjaman_id', $pinjaman->id)->sum('total');
        $sisa_pinjaman = $pinjaman->total - $cicilan;
        return view('pinjaman.history', compact('pinjaman', 'sisa_pinjaman'));
    }

    public function history_print(Pinjamans $pinjaman)
    {
        $cicilan = Cicilan::where('pinjaman_id', $pinjaman->id)->sum('total');
        $sisa_pinjaman = $pinjaman->total - $cicilan;
        return view('pinjaman.history_print', compact('pinjaman', 'sisa_pinjaman'));
    }
}
