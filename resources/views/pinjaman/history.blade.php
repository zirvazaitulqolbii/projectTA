@extends('layouts.master')

@section('content')

<main class="container">
    <br>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
              <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <div class="card-title mb-0">
                  <h4 class="m-0 me-2"><a href="/pinjaman"><i class="bx bx-arrow-back"></i></a> History cicilan pinjaman</h4>
                  <hr>
                </div>
              </div>
              <div class="card-body">
                <h5 class="mt-3">👤 Informasi anggota</h5>
                <div class="row">
                    <div class="col-md-4">
                        <table class="table-borderless mb-2" style="font-size: 14px;width: 100%">
                            <tr>
                                <td>Nama anggota</td>
                                <td>:</td>
                                <td>{{ ucwords($pinjaman->user->nama) }}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>{{ $pinjaman->PenganjuanPinjamans->keterangan }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($pinjaman->tanggal)->isoFormat('DD MMMM Y') }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>
                                    @if ($pinjaman->status =='Lunas')
                                    <span class="badge bg-label-primary me-1">{{ $pinjaman->status }}</span>
                                    @else
                                    <span class="badge bg-label-danger me-1">{{ $pinjaman->status }}</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-6 mb-4">
                                <div class="card shadow border-primary">
                                  <div class="card-body">
                                    <h4 class="card-title text-nowrap mb-1">Rp {{ number_format($pinjaman->nominal,0,',','.') }}</h4>
                                    <small class="text-primary fw-semibold"><i class="bx bx-wallet"></i> Total pinjaman</small>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-4 col-6 mb-4">
                                <div class="card shadow border-primary">
                                  <div class="card-body">
                                    <h4 class="card-title text-nowrap mb-1">Rp {{ number_format($pinjaman->total,0,',','.') }}</h4>
                                    <small class="text-primary fw-semibold"><i class="bx bx-wallet"></i> Pembayaran <span>(+10% )</span></small>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-4 col-6 mb-4">
                                <div class="card shadow border-primary">
                                  <div class="card-body">
                                    <h4 class="card-title text-nowrap mb-1">Rp {{ number_format($sisa_pinjaman,0,',','.') }}</h4>
                                    <small class="text-primary fw-semibold"><i class="bx bx-wallet"></i> Sisa pembayaran</small>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="" style="position: relative;">
                          <div class="resize-triggers"><div class="expand-trigger"><div style="width: 338px; height: 139px;"></div></div><div class="contract-trigger"></div></div>
                          </div>
                    </div>
                </div>
                <h5>🕛 Detail cicilan</h5>
                <a class="btn btn-success btn-default"
                        target="_blank"
                        href="{{ route('history.print', $pinjaman->id) }}"
                        target="_blank" style="color: white;"><i class="bx bx-printer"></i> Cetak history
                </a><br><br>
                <ul class="p-0 m-0">
                    @foreach ($pinjaman->cicilan()->orderBy('tanggal_pembayaran', 'ASC')->get() as $item)
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-history"></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h5 class="mb-0">Rp {{ number_format($item->total,0,',','.') }} <small class="text-muted" style="font-size: 13px"> ( <i> pembayaran ke- {{ $loop->iteration }}</i> )</small></h5>
                          <small class=""><i>  🗓️ {{ \Carbon\Carbon::parse($item->tanggal_pembayaran)->isoFormat('DD MMMM Y') }}</i></small>
                        </div>
                        <div class="user-progress">
                          <small class="text-muted">✅</small>
                        </div>
                      </div>
                    </li>
                    @endforeach
                </ul>
              </div>
            </div>
          </div>
    </div>

</main>


@endsection
