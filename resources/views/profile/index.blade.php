@extends('layouts.master')

@section('content')
 <main>
    <div class="card">
        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5">
                <form action="/profile/{{ $data->id }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <h5 class="card-header text-center font-weight-bold">Edit Data User</h5><br>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Nama User</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{old('nama',$data->nama)}}" autofocus placeholder="Nama User">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email',$data->email)}}" autofocus placeholder="Email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Password</label>
                                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{old('password',$data->password)}}" autofocus placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Password Konfirmasi</label>
                                <input type="text" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" value="{{old('password_confirmation',$data->password_confirmation)}}" autofocus placeholder="Password Konfirmasi">
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Role User</label>
                                <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="role" value="{{old('role',$data->role)}}" autofocus placeholder="role User">
                                @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-1">
                                @if ($data->avatar)
                                    <img style="max-width: 250px" src="{{ url('images').'/'.$data->avatar }}" alt="{{ $data->nama_foto }}"
                                        class="img-thumbnail img-preview">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Foto User</label>
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar"
                                    name="avatar" value="{{ old('avatar') }}" autofocus>
                                @error('avatar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                {{-- <button href="{{ url('profile') }}" class="btn btn-secondary me-md-2" type="redirect">Kembali</button> --}}
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
    </div>
    <br>
@endsection
