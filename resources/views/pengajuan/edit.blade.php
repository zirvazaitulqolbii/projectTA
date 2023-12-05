@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-auto mx-auto cf-container">
                    <form action="/cicilan/{{$cicilans->id}}" method="post">
                        @method('PUT')
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
                                        <h3 class="mb-0">Edit Data Cicilan</h4>
                                    </div>
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <small class="text-muted float-start">Silahkan masukan data yang
                                            sesuai!!!</small>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label"
                                                    for="basic-icon-default-fullname">Nama</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                                class="bx bx-user"></i></span>
                                                                <select class="form-select" name="user_id"  aria-label="Default select example">
                                                                    <option selected></option>
                                                                    @foreach($users as $user)
                                                                        @if (old('user_id',$cicilans->user_id) == $user->id)
                                                                            <option value="{{ $user->id }}" selected>{{ $user->nama }} </option>
                                                                        @else
                                                                            <option value="{{ $user->id }}">{{ $user->nama }} </option>
                                                                        @endif
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
                                                    for="basic-icon-default-notepad">Nominal</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-notepad2"
                                                            class="input-group-text"><i
                                                                class="bx bx-buildings"></i></span>
                                                        <input type="number" id="nominal"
                                                            class="form-control @error('nominal') is-invalid @enderror"
                                                            value="{{ old('nominal', $cicilans->nominal) }}" placeholder="Nominal" aria-label="Nominal"
                                                            name="nominal" aria-describedby="basic-icon-default-notepad2" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 form-label">Tanggal Pembayaran</label>
                                                <div class="col-sm-10">
                                                    <input type="date" placeholder="Enter Tanggal Pembayaran"
                                                        class="form-control
                                                        @error('tanggal_pembayaran') is-invalid @enderror"
                                                        value="{{ old('tanggal_pembayaran', $cicilans->tanggal_pembayaran) }}" id="tanggal_pembayaran"
                                                        name="tanggal_pembayaran">
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
                                                            value="{{ old('keterangan', $cicilans->keterangan) }}" placeholder="keterangan" aria-label="keterangan"
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
