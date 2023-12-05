<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
// use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        // $nip = request('');
        $users = auth()->user();
        $data = User::where('id', $users->id)->first();
        // if(session('success_message')){
        //     Alert::toast( session('success_message'),'success');
        // }


        return view('profile.index',[
            'users' => User::first(),
            'data' => $data
        ]);
    }

    public function edit(Request $request)
    {
        $users = auth()->user();
        dd($users);
        $data = User::where('id', $users->id)->first();
        return view('profile.index')->with('data', $data);
    }

    public function show(User $user)
    {
        $users = auth()->user();
        $data = User::where('id', $users->id)->first();

        return view('profile.index')->with('data', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama.required' => 'Nama User Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'password_confirmation.required' => 'Password Harus Diisi',
            'avatar.required' => 'Foto User Harus Diisi',
            'avatar.image' => 'Foto User Harus Gambar',
            'avatar.mimes' => 'Foto User Harus Berformat jpeg,png,jpg,gif,svg',
            'avatar.max' => 'Foto User Maksimal 2MB',
        ]);

        $foto_file = $request->file('avatar');
        $foto_ekstensi = $foto_file->getClientOriginalExtension();
        $nama_foto = time() . '.' . $foto_ekstensi;
        $foto_file->move(public_path('images'), $nama_foto);
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_confirmation' => Hash::make($request->password_confirmation),
            'avatar' => $nama_foto
        ];

        $title = 'Tambah User';

        User::create($data);
        return redirect()->route('user.index')->withSuccessMessage('Data User Berhasil Ditambahkan', compact('title'));

    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama.required' => 'Nama User Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'password_confirmation.required' => 'Password Harus Diisi',
            'avatar.required' => 'Foto User Harus Diisi',
            'avatar.image' => 'Foto User Harus Gambar',
            'avatar.mimes' => 'Foto User Harus Berformat jpeg,png,jpg,gif,svg',
            'avatar.max' => 'Foto User Maksimal 2MB',
        ]);


        if ($request->hasFile('avatar')) {
            $foto_file = $request->file('avatar');
            $foto_ekstensi = $foto_file->getClientOriginalExtension();
            $nama_foto = time() . '.' . $foto_ekstensi;
            $foto_file->move(public_path('images'), $nama_foto);
            $data_foto = User::where('id', $user->id)->first();
            File::delete(public_path('images/' . $data_foto->avatar));
        }

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_confirmation' => Hash::make($request->password_confirmation),
            'avatar' => $nama_foto
        ];

        $data['avatar'] = $nama_foto;
        $title = 'Edit User';


        User::where('id', $user->id)->update($data);
        return redirect()->route('profile.index')->with('pesan','Profile berhasil diupdate!');
    }
}
