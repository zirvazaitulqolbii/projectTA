@extends('layouts.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card shadow">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Selamat Datang di Koperasi! 🎉</h5>
                <p class="mb-4">
                    "Bersama Maju, Berkarya Unggul: Koperasi Menuju Sukses Bersama!"
                </p>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="../assets/img/illustrations/man-with-laptop-light.png"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <span class="text-primary fw-semibold"> Total anggota</span>
                    <h3 class="card-title text-nowrap mb-2">{{ \App\Models\User::where('role','anggota')->count() }}</h3>
                    {{-- <small class="text-danger fw-semibold"><i class="bx bx-right-arrow-alt"></i> Total anggota</small> --}}
                </div>
            </div>
        </div>
        <div class="col-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <span class="text-primary fw-semibold"> Total pinjaman anggota {{ date('Y') }}</span>
                    <h3 class="card-title text-nowrap mb-2">Rp {{ number_format(\App\Models\Pinjamans::whereYear('tanggal', date('Y', strtotime(now())))->sum('nominal') ,0,',','.') }}</h3>
                    {{-- <small class="text-danger fw-semibold"><i class="bx bx-right-arrow-alt"></i> Total anggota</small> --}}
                </div>
            </div>
        </div>
        <div class="col-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <span class="text-primary fw-semibold">Cicilan anggota {{ date('Y') }} (+10% bunga)</span>
                    <h3 class="card-title text-nowrap mb-2">Rp {{ number_format(\App\Models\Cicilan::whereYear('tanggal_pembayaran', date('Y', strtotime(now())))->sum('total') ,0,',','.') }}</h3>
                    {{-- <small class="text-danger fw-semibold"><i class="bx bx-right-arrow-alt"></i> Total anggota</small> --}}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 order-2 mb-4">
            <div class="card h-100">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Pengajuan pinjaman terbaru</h5>
              </div>
              <div class="card-body">
                <ul class="p-0 m-0">
                    @foreach (\App\Models\PenganjuanPinjamans::orderBy('tanggal_pengajuan', 'DESC')->limit(5)->get() as $item)
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">{{ ucwords($item->user->nama) }}
                                 <span class="badge rounded-pill {{ $item->status == 'konfirmasi' ? 'bg-success' : 'bg-danger' }}" style="font-size: 8px">{{ $item->status }}</span>
                            </h6>
                            <small class="text-muted d-block mb-1">{{ $item->keterangan }}</small>
                            <small>{{ date('d F Y', strtotime($item->tanggal_pengajuan)) }}</small>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                            <span class="text-muted">Rp</span>
                            <h6 class="mb-0">{{ number_format($item->nominal,0,',','.') }}</h6>
                            <a href="/pengajuan"><i class="bx bx-arrow-to-right"></i></a>
                        </div>
                      </div>
                    </li>
                    @endforeach
                </ul>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 order-2 mb-4">
            <div class="card h-100">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Cicilan anggota terbaru</h5>
              </div>
              <div class="card-body">
                <ul class="p-0 m-0">
                    @foreach (\App\Models\Cicilan::orderBy('tanggal_pembayaran', 'DESC')->limit(5)->get() as $item)
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">{{ ucwords($item->user->nama) }}</h6>
                            <small class="text-muted d-block mb-1">NIP : {{ $item->user->nip }}</small>
                            <small class="">{{ date('d F Y', strtotime($item->tanggal_pembayaran)) }}</small>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                            <span class="text-muted">Rp</span>
                            <h6 class="mb-0">{{ number_format($item->total,0,',','.') }} <small>(bunga 10%)</small></h6>
                        </div>
                      </div>
                    </li>
                    @endforeach
                </ul>
              </div>
            </div>
        </div>
    </div>

    </div>
  </div>
  @endsection
