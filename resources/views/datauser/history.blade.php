@extends('layouts.master')

@section('content')

<main class="container">
    <br>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h4 class="m-0 me-2"><a href="/user"><i class="bx bx-arrow-back"></i></a> Detail data anggota</h4>
                        <hr>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="mt-3">👤 Informasi anggota</h5>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Nama anggota:</strong> {{ $user->nama }}<br>
                            <strong>NIP:</strong> {{ $user->nip }}<br>
                            <strong>Email:</strong> {{ $user->email }}<br>
                            <strong>Avatar:</strong> {{ $user->avatar }}<br>
                            <strong>No HP:</strong> {{ $user->no_hp }}<br>
                            <strong>Alamat:</strong> {{ $user->alamat }}<br>
                            <strong>Jenis Kelamin:</strong> {{ $user->jenis_kelamin }}<br>
                            <strong>Role:</strong> {{ $user->role }}<br>
                            <strong>Tanggal Masuk:</strong> {{ \Carbon\Carbon::parse($user->tanggal_masuk)->isoFormat('D MMMM YYYY') }}<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
