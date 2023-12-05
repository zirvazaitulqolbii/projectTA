@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-auto mx-auto cf-container">
                    <form action="/cicilan" method="post">
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
                                            <h3 class="mb-0">Tambah Data Cicilan</h4>
                                        </div>
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <small class="text-muted float-start">Silahkan masukan data yang
                                                sesuai!!!</small>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-fullname">Id Pinjaman</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                                    class="bx bx-user"></i></span>
                                                            <select
                                                                class="form-select @error('pinjaman_id') is-invalid @enderror"
                                                                id="pinjaman_id" name="pinjaman_id" aria-label="Nama"
                                                                aria-describedby="basic-icon-default-fullname2">
                                                                <option selected disabled>Pilih Id</option>
                                                                @foreach ($pinjamans as $p)
                                                                    <option value="{{ $p->id }}"
                                                                        data-id="{{ $p->nominal }}">{{ $p->user->nama }} &nbsp;
                                                                        - &nbsp; {{ 'Rp '.number_format( $p->total) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('pinjaman_id')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-notepad">Sisa pinjaman</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge mt-2">
                                                            <h5 id="sisa_bayar" class="font-weight-bold">Rp 0</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-notepad">nominal cicilan / bulan</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge mt-3">
                                                            <h5 id="nominal" class="font-weight-bold">Rp 0</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 form-label">Tanggal Pembayaran</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" placeholder="Enter Tanggal Pembayaran"
                                                            class="form-control
                                                            @error('tanggal_pembayaran') is-invalid @enderror"
                                                            value="{{ old('tanggal_pembayaran') }}" id="tanggal_pembayaran"
                                                            name="tanggal_pembayaran">
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

@push('script')
    <script>
        $(document).ready(function () {
            $('#pinjaman_id').change(function(e){
                e.preventDefault();
                var pinjaman_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('get.sisa.pinjaman') }}",
                    data: {pinjaman_id:pinjaman_id},
                    dataType: "json",
                    success: function (res) {
                        if(res.status == 'ok'){
                            $('#sisa_bayar').html(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(res.sisa_pinjaman));
                            $('#nominal').html(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(parseInt( res.total_pinjam) / 10) + ` <small><i>( pembayaran ke : ${parseInt(res.jumlah_cicilan + 1)}x )</i> </small>`);
                        }
                    }
                });
            })
        });
    </script>
@endpush
