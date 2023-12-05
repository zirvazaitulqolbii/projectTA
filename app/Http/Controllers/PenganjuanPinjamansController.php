<?php

namespace App\Http\Controllers;

use App\Models\PenganjuanPinjamans;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PenganjuanPinjamansController extends Controller
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
            $penganjuanpinjamans = PenganjuanPinjamans::query()->orderBy('tanggal_pengajuan', 'DESC')->get();
        } else {
            $penganjuanpinjamans = PenganjuanPinjamans::where('user_id', $id)->orderBy('tanggal_pengajuan', 'DESC')->get();
        }

        return view('pengajuan.index', [
            'pengajuanpinjamans' => $penganjuanpinjamans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuan.create', [
            'users' => User::all(),
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
            'user_id' => 'required',
            'nominal' => 'required',
            'tanggal_pengajuan' => 'required',
            'keterangan' => 'required',
        ]);
        PenganjuanPinjamans::create($validatedData);
        return redirect('/pengajuan')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganjuanPinjamans  $penganjuanPinjamans
     * @return \Illuminate\Http\Response
     */
    public function show(PenganjuanPinjamans $penganjuanPinjamans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganjuanPinjamans  $penganjuanPinjamans
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penganjuanPinjamans = PengajuanPinjamans::find($id);
        $user = User::find($id);
        return view('pengajuan.edit', [
            'penganjuan_pinjamans' => $penganjuanPinjamans,
            'users' => User::all()
        ]);
    }

    public function edit_status($penganjuanPinjamans, $status,)
    {
        DB::table('penganjuan_pinjamans')->where('id', $penganjuanPinjamans)->update([
            'status' => $status
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pengajuan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganjuanPinjamans  $penganjuanPinjamans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenganjuanPinjamans $penganjuanPinjamans)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'nominal' => 'required',
            'tanggal_pengajuan' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ]);
        PenganjuanPinjamans::where('id', $penganjuanPinjamans->id)->update($validatedData);
        return redirect('/pengajuan')->with('pesan', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganjuanPinjamans  $penganjuanPinjamans
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenganjuanPinjamans $penganjuanPinjamans)
    {
        PenganjuanPinjamans::destroy($id);
        return redirect('/pengajuan')->with('pesan', 'Data Berhasil Dihapus');
    }
}
