<?php

namespace App\Http\Controllers;

use App\Models\Cicilan;
use App\Models\Pinjamans;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CicilanController extends Controller
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
            $cicilan = Cicilan::query()->get();
        } else {
            $cicilan = Cicilan::where('user_id', $id)->get();
        }
        return view('cicilan.index', [
            'cicilans' => Cicilan::latest()->get(),
            'cicilans' => $cicilan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pinjamans = Pinjamans::where('status', 'Belum Lunas')->orderBy('tanggal', 'DESC')->get();
        return view('cicilan.create', [
            'pinjamans' => $pinjamans,
        ]);
    }

    public function get_sisa_pinjaman(Request $request)
    {
        $pinjaman_id = $request->pinjaman_id;
        $pinjaman = Pinjamans::find($pinjaman_id);
        $cicilan = Cicilan::where('pinjaman_id', $pinjaman_id)->sum('total');
        return response()->json([
            'status' => 'ok',
            'total_pinjam' => $pinjaman->total,
            'sisa_pinjaman' => $pinjaman->total - $cicilan,
            'jumlah_cicilan' => Cicilan::where('pinjaman_id', $pinjaman_id)->count(),
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
            'pinjaman_id' => 'required',
            'tanggal_pembayaran' => 'required',
        ]);
        $pinjaman = Pinjamans::find($request->pinjaman_id);
        $cicilan = $pinjaman->total / 10;
        Cicilan::create([
            'user_id' => $pinjaman->user_id,
            'pinjaman_id' => $request->pinjaman_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'total'     => $cicilan,
        ]);

        //cek sisa bayar
        $sisaPinjaman = $pinjaman->total -  Cicilan::where('pinjaman_id', $pinjaman->id)->sum('total');
        if ($sisaPinjaman <= 0) {
            $pinjaman->status = 'Lunas';
            $pinjaman->save();
        }
        return redirect('/cicilan')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cicilan  $cicilan
     * @return \Illuminate\Http\Response
     */
    public function show(Cicilan $cicilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cicilan  $cicilan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cicilan = Cicilan::find($id);
        $pinjamans = Pinjamans::find($id);
        $user = User::find($id);
        return view('cicilan.edit', [
            'cicilans' => $cicilan,
            'users' => User::all(),
            'pinjamans' => Pinjamans::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cicilan  $cicilan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cicilan $cicilan)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pinjaman_id' => 'required',
            'nominal' => 'required',
            'tanggal_pembayaran' => 'required',
            'total' => 'required',
        ]);
        Cicilan::where('id', $cicilan->id)->update($validatedData);
        return redirect('/cicilan')->with('pesan', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cicilan  $cicilan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cicilan $cicilans, $id)
    {
        Cicilan::destroy($id);
        return redirect('/cicilan')->with('pesan', 'Data Berhasil Dihapus');
    }
}
