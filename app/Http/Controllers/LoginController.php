<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function registrasi(Request $request)
    {
        return view('registrasi');
    }
    public function registrasiProses(Request $request)
    {

        // dd($request->all());
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required',
            'email' => ' required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6'


        ]);
        // dd($request->all());
        $user = User::create([
            'nama'=>$request->nama,
            'nip'=>$request->nip,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'password_confirmation'=>Hash::make($request->password_confirmation),
        ]);
        return redirect('/')->with('success', 'Akun Sukses ditambahkan');
    }

    public function index()
    {
    	return view('login');
    }


    public function authenticate(Request $request)
    {
        // dd($request->all());
    	$request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // // create user
        // $cek = $request->only('email', 'password');
        // if(Auth::attempt($cek)){
        //     $request->session()->regenerate();
        //     return redirect('/dashboard')->with('success', 'Login Successfully');
        // }

        $cek = $request->validate([
            'email' => 'required|email',
            'password' => ['required'],
        ]);


        $cek = $request->only('email', 'password');
        if(Auth::attempt($cek)) {
                // $request->session()->regenerate();

                return redirect()->intended('/dashboard')->with('success', 'Login Successfully');
            }

        return back()->withErrors([
            'email' =>  'These credentials do not match our records',
            'password' =>  'Password anda salah',
        ]);

    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Terima Kasih');
}
}
