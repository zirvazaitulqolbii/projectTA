@extends('layouts.master')

@section('content')

<main class="container">
    @if (session()->has('pesan'))
    <div class="alert alert-success" role="alert">
        {{ session('pesan') }}
    </div>
    @endif

    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Data User</h3>
        </div>
        <div class="card-body">
            <a href="/user/create" class="btn btn-primary">Create User</a>
            <a class="btn btn-success btn-default mx-2" href="/cetakuser" target="_blank" style="color: white;">
                <i class="fa fa-print"></i> Cetak PDF</a>
                <br><br>
            <table class="table table-hover mt-7" id="myTable" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $u->nama }}</td>
                        <td>{{ $u->nip }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->no_hp }}</td>
                        <td>{{ $u->alamat }}</td>
                        <td>

                            <a href="/user/{{$u->id}}/history" class="btn btn-link text-primary"
                                 title="history"><i class="bx bx-history"></i></a>
                            <a href="/user/{{$u->id}}/edit" class="btn btn-link"><i
                                class="bx bx-edit "></i></a>

                            <form action="/user/{{$u->id}}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Yakin akan menghapus data ?')" class="btn btn-link"><i
                                    class="bx bx-trash "></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection
