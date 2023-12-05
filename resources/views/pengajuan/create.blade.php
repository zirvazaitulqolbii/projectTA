@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-auto mx-auto cf-container">
                    <form action="/pengajuan" method="post">
                        @csrf
                            <br>
                            {{-- <div class="session-title row">
							<h2>Tambah Data</h2>
							<p>Silahkan masukan data yang sesuai!!!</p>
						</div> --}}

                            <div class="row">
                                <!-- Basic with Icons -->
                                <div class="col-xxl">
                                    <div class="card mb-12">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <h3 class="mb-0">Tambah Data Pengajuan Pinjaman</h4>
                                        </div>
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <small class="text-muted float-start">Silahkan masukan data yang
                                                sesuai!!!</small>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                            <select class="form-select @error('nama') is-invalid @enderror" id="user_id" name="user_id"
                                                                    aria-label="Nama" aria-describedby="basic-icon-default-fullname2">
                                                                <option selected disabled>Pilih Nama</option>
                                                                @foreach ($users as $user)
                                                                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('nama')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-notepad">nominal</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-notepad2"
                                                                class="input-group-text"><i
                                                                    class="bx bx-buildings"></i></span>
                                                            <input type="text" id="nominal"
                                                                class="form-control @error('nominal') is-invalid @enderror"
                                                                value="{{ old('nominal') }}" placeholder="Nominal" aria-label="Nominal"
                                                                name="nominal" aria-describedby="basic-icon-default-notepad2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 form-label">Tanggal Pengajuan</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" placeholder="Enter Tanggal Pengajuan"
                                                            class="form-control
                                                            @error('tanggal_pengajuan') is-invalid @enderror"
                                                            value="{{ old('tanggal_pengajuan') }}" id="tanggal_pengajuan"
                                                            name="tanggal_pengajuan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-notepad">Keterangan</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-notepad2"
                                                                class="input-group-text"><i
                                                                    class="bx bx-buildings"></i></span>
                                                            <input type="text" id="keterangan"
                                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                                value="{{ old('keterangan') }}" placeholder="keterangan" aria-label="keterangan"
                                                                name="keterangan" aria-describedby="basic-icon-default-notepad2" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row justify-content-end">
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                        @endsection
