@extends('layouts.master')

@section('content')
    <main class="container">
        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif

        <table class="table table-bordered mt-4">
            <br>
            <h3>Feedback</h3>
            <a href="/feedback/create" class="btn btn-primary">Create Feedback</a>


            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Nama</th>
                <th>No Hp</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>

            @foreach ($feedbacks as $f)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $f->id }} </td>
                    <td> {{ $f->nama }} </td>
                    <td> {{ $f->no_hp }} </td>
                    <td> {{ $f->pesan }} </td>
                    <td>
                        <a href="/feedback/{{ $f->id }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/feedback/{{ $f->id }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Yakin akan menghapus data ?')">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            <tr>
            </tr>
        </table>
    </main>
@endsection
