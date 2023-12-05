<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimpananController extends Controller
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
            $simpanan = Simpanan::query()->get();
        } else {
            $simpanan = Simpanan::where('user_id', $id)->get();
        }
        // $simpanan_wajib = Simpanan::where('tipe','wajib')->get();
        // $simpanan_pokok = Simpanan::where('tipe','pokok')->get();
        return view('simpanan.index',[
            // 'wajibs'=>$simpanan_wajib,
            // 'pokoks'=>$simpanan_pokok,
            'simpanans' => $simpanan,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('simpanan.create',[
            'users'=>User::all(),
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
        $validatedData=$request->validate([
            'user_id' => 'required',
            'tipe' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
        ]);
        Simpanan::create($validatedData);
        return redirect('/simpanan')->with('pesan','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function show(Simpanan $simpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $simpanan = Simpanan::find($id);
        $user = User::find($id);
        return view('simpanan.edit', [
            'simpanans' => $simpanan,
            'users'=>User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'user_id' => 'required',
            'tipe' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
        ]);
        Simpanan::where('id', $id)->update($validatedData);
        return redirect('/simpanan')->with('pesan','Data Berhasil Diupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Simpanan::destroy($id);
        return redirect('/simpanan')->with('pesan','Data Berhasil Dihapus');
    }
}
