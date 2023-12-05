@extends('layouts.master')

@section('content')

<main class="container">
	@if (session()->has('pesan'))
	<div class="alert alert-success" role="alert">
		{{ session ('pesan') }}
	</div>
	@endif
    <br>

    <div class="card">
        <div class="card-body">
            <h3>Data Pinjaman</h3>
            <a href="/pinjaman/create" class="btn btn-primary">Create Pinjaman</a>
            <a class="btn btn-success btn-default mx-2"
                    href="/cetakpinjaman"
                    target="_blank" style="color: white;">Cetak Laporan
            </a>

            <br><br>
            <table class="table table-hover mt-4" id="myTable" style="font-size: 12px">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Id Pengajuan</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Nominal</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($pinjamans as $p)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $p->user->nama }} </td>
                        <td> {{ $p->PenganjuanPinjamans->id }} </td>
                        <td> {{ $p->tanggal }} </td>
                        <td>Rp {{number_format($p->nominal,0,',','.')  }} </td>
                        <td>Rp {{ number_format($p->total,0,',','.')  }} (+10% bunga) </td>
                        <td>
                            <span class="badge bg-label-primary me-1">{{ $p->status }}</span>
                        </td>
                      <td>
                            <a href="/pinjaman/{{$p->id}}/history" class="btn btn-link text-primary" title="history"><i class="bx bx-history"></i></a>
                              {{-- <a href="/pinjaman/{{$p->id}}/edit" class="btn btn-link text-warning"><i class="bx bx-edit"></i></a> --}}
                              @if (Auth::user()->role == 'anggota')
                            <div hidden>
                              <form action="/pinjaman/{{$p->id}}" method="post" class="d-inline">
                                  @method('DELETE')
                                  @csrf
                                  <button class="btn btn-link text-danger" type="submit" onclick="return confirm('Yakin akan menghapus data ?')"><i class="bx bx-trash-alt"></i></button>
                              </form>
                            </div>
                            @else
                            <form action="/pinjaman/{{$p->id}}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link text-danger" type="submit" onclick="return confirm('Yakin akan menghapus data ?')"><i class="bx bx-trash-alt"></i></button>
                            </form>
                            @endif
                      </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>

{{-- {{ $users->links('pagination::bootstrap-5') }} --}}

@endsection
