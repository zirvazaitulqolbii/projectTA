@extends('layouts.master')

@section('content')
    <main class="container">
        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif

        <br>


       <div class="card">
        <div class="card-body">
            <h3>Data Pengajuan Pinjaman</h3>
            @if (Auth::user()->role == 'admin')
                <a hidden href="/pengajuan/create" class="btn btn-primary">Create Pengajuan Pinjaman</a>
            @else
                <a href="/pengajuan/create" class="btn btn-primary">Create Pengajuan Pinjaman</a>
            @endif
            <br><br>
            <table class="table table-hover mt-4" id="myTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuanpinjamans as $pp)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $pp->user->nama }} </td>
                        <td> {{ $pp->nominal }} </td>
                        <td> {{ $pp->tanggal_pengajuan }} </td>
                        <td> {{ $pp->keterangan }} </td>
                        <td>
                            @if ($pp->status == 'belum_konfirmasi')
                                <a href="/pengajuan/{{ $pp->id }}/konfirmasi"
                                    onclick="return confirm('Yakin Akan Mengubah Status pengajuan..?')"
                                    class="btn btn-warning btn-sm">Belum Konfirmasi</a>
                            @elseif($pp->status == 'konfirmasi')
                                <button class="btn btn-success btn-sm">Konfirmasi</button>
                            @endif
                        </td>
                        {{-- <td>
                            <a href="/pengajuan/{{ $pp->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/pengajuan/{{ $pp->id }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Yakin akan menghapus data ?')">Delete</button>
                            </form>

                        </td> --}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
       </div>
    </main>
    {{--
{{ $users->links('pagination::bootstrap-5') }} --}}
@endsection
