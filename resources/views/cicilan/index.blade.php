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
            <br>
            <h3>Data Cicilan</h3>
            @if (Auth::user()->role == 'anggota')
                <a hidden href="/cicilan/create" class="btn btn-primary">Create Cicilan</a>
            @else
                <a href="/cicilan/create" class="btn btn-primary">Create Cicilan</a>
                <a class="btn btn-success btn-default mx-2" href="/cetakcicilan" target="_blank" style="color: white;">Cetak cicilan</a>
            @endif
    <br><br>
            <table class="table table-hover mt-4" id="myTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Id Pinjaman</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Bunga</th>
                        <th>Nominal cicilan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cicilans as $c)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $c->user->nama }} </td>
                        <td> {{ $c->id }} </td>
                        <td> {{ $c->tanggal_pembayaran }} </td>
                        <td> {{ $c->bunga }} </td>
                        <td> {{ $c->total }} </td>
                        <td>
                            {{-- <a href="/cicilan/{{ $c->id }}/edit" class="btn btn-warning">Edit</a> --}}
                            @if (Auth::user()->role == 'anggota')
                            <div hidden>
                            <form action="/cicilan/{{ $c->id }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Yakin akan menghapus data ?')">Delete</button>
                            </form>
                            </div>
                            @else
                            <form action="/cicilan/{{ $c->id }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Yakin akan menghapus data ?')">Delete</button>
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
    {{--
{{ $users->links('pagination::bootstrap-5') }} --}}
@endsection
