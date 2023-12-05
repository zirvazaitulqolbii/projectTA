@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto cf-container">
                    <form action="/feedback/{{$feedbacks->id}}" method="post">
                        @method('PUT')
                        @csrf
                            <br>

                            <div class="row">
                                <!-- Basic with Icons -->
                                <div class="col-xxl">
                                    <div class="card mb-12">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <h3 class="mb-0">Edit Feedback</h4>
                                        </div>

                                        <div class="card-body">
                                            <form>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-fullname">Nama</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2"
                                                                class="input-group-text"><i class="bx bx-user"></i></span>
                                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                               value="{{ old('nama', $feedbacks->nama) }}" id="nama" placeholder="Nama" name="nama"
                                                                aria-label="Nama"
                                                                aria-describedby="basic-icon-default-fullname2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">No
                                                        Handphone</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                                    class="bx bx-phone"></i></span>
                                                            <input type="text" id="basic-icon-default-phone"
                                                                class="form-control phone-mask @error('no_hp') is-invalid @enderror"
                                                                value="{{ old('no_hp', $feedbacks->no_hp) }}" id="no_hp" name="no_hp"
                                                                placeholder="masukkan no telfon"
                                                                aria-describedby="basic-icon-default-phone2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 form-label" for="basic-icon-default-message">Pesan</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-message"></i></span>
                                                            <textarea id="basic-icon-default-message" class="form-control phone-mask @error('pesan') is-invalid @enderror"
                                                                name="pesan" placeholder="masukkan pesan">{{ old('pesan', $feedbacks->pesan) }}</textarea>
                                                        </div>
                                                        @error('pesan')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
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
