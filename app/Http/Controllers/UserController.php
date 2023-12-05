<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datauser.index',[
            'users'=>User::latest()->get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datauser.create');
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
            'nama' => 'required',
            'nip' => 'required|unique:users',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:P,L',
            'tanggal_masuk' => 'required',
            'role' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        $users = new User();
        $users->nama = $request->nama;
        $users->nip = $request->nip;
        $users->email = $request->email;
        $users->avatar = $request->avatar;
        $users->no_hp = $request->no_hp;
        $users->alamat = $request->alamat;
        $users->jenis_kelamin = $request->jenis_kelamin;
        $users->tanggal_masuk = $request->tanggal_masuk;
        $users->role = $request->role;
        $users->password = bcrypt($request->password);
        $users->password_confirmation = bcrypt($request->password_confirmation);
        $users->save();
        return redirect('/user')->with('pesan','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('datauser.edit', [
            'users' => $user,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $validatedData=$request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:users',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:P,L',
            'tanggal_masuk' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        User::where('id', $user->id)->update($validatedData);
        return redirect('/user')->with('pesan','Data Berhasil Diupdate');
    }

    public function history(User $user)
    {
        // Mengambil data anggota berdasarkan ID yang diberikan
        $userData = User::findOrFail($user->id);

        return view('datauser.history', [
            'user' => $userData
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with('pesan','Data Berhasil Dihapus');
    }
}
