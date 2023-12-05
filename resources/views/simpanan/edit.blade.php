@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto cf-container">
                    <form action="/simpanan/{{ $simpanans->id }}" method="post">
                        @method('PUT')
                        @csrf
                        <br>
                        {{-- <div class="session-title row">
							<h2>Tambah Data</h2>
							<p>Silahkan masukan data yang sesuai!!!</p>
						</div> --}}
                        <div class="col-xxl">
                            <div class="card mb-12 col-12">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h3 class="mb-0">Edit Data Simpanan</h4>
                                </div>
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <small class="text-muted float-start">Silahkan masukan data yang
                                        sesuai!!!</small>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-icon-default-fullname">Nama</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                        <select class="form-select" name="user_id" aria-label="Default select example">
                                                            <option selected></option>
                                                            @foreach($users as $user)
                                                                @if (old('user_id',$simpanans->user_id) == $user->id)
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
                                            for="basic-icon-default-fullname">Tipe</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                <select class="form-select @error('tipe') is-invalid @enderror"
                                                    id="tipe" name="tipe" aria-label="tipe"
                                                    aria-describedby="basic-icon-default-fullname2">
                                                    {{-- <option selected disabled value="{{ old('tipe', $simpanans->tipe) }}">
                                                        Pilih tipe</option> --}}
                                                    <option value="wajib"
                                                        @if (old('tipe', $simpanans->tipe) === 'simpananwajib') selected @endif>Simpanan Wajib
                                                    </option>
                                                    <option value="pokok"
                                                        @if (old('tipe', $simpanans->tipe) === 'simpananpokok') selected @endif>Simpanan Pokok
                                                    </option>
                                                </select>
                                            </div>
                                            @error('tipe')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-icon-default-notepad">nominal</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-notepad2" class="input-group-text"><i
                                                        class="bx bx-buildings"></i></span>
                                                <input type="number" id="nominal"
                                                    class="form-control @error('nominal') is-invalid @enderror"
                                                    value="{{ old('nominal', $simpanans->nominal) }}" placeholder="Nominal"
                                                    aria-label="Nominal" name="nominal"
                                                    aria-describedby="basic-icon-default-notepad2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 form-label">Tanggal Pembayaran</label>
                                        <div class="col-sm-10">
                                            <input type="date" placeholder="Enter Tanggal Pembayaran"
                                                class="form-control
                                    @error('tanggal') is-invalid @enderror"
                                                value="{{ old('tanggal', $simpanans->tanggal) }}" id="tanggal"
                                                name="tanggal">
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
