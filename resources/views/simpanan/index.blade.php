@extends('layouts.master')

@section('content')
    <main class="container">
        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif
        {{--  <div class="row">
            <div class="col-md-4">
                <select class="form-select" aria-label="Default select example " id="tipe">
                    <option selected>Pilih Tipe Simpanan</option>
                    <option value="pokok">Simpanan Pokok</option>
                    <option value="wajib">Simpanan Wajib</option>
                </select>
            </div>
        </div>  --}}
        <br>

        {{--  @if (Request::get('type') == 'wajib')
            <div class="card" id="tb_wajib">  --}}
            <div class="card">
                <div class="card-body">
                    <h3>Data Simpanan</h3>
                <div style="display: flex;">
                    @if (Auth::user()->role == 'anggota')
                        <a hidden href="/simpanan/create" class="btn btn-primary ">Create Simpanan</a>
                        <a hidden class="btn btn-success btn-default mx-2" href="/cetaksimpanan" target="_blank"
                            style="color: white;">Cetak Simpanan</a>
                    @else
                        <a href="/simpanan/create" class="btn btn-primary ">Create Simpanan</a>
                        <a class="btn btn-success btn-default mx-2" href="/cetaksimpanan" target="_blank"
                            style="color: white;">Cetak Simpanan</a>
                    @endif
                </div>
                <br>
                    <table class="table table-hover mt-4 " id="myTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($simpanans as $s)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $s->user->nama }} </td>
                                    <td> {{ $s->tipe }} </td>
                                    <td> {{ $s->nominal }} </td>
                                    <td> {{ $s->tanggal }} </td>
                                    <td>
                                        @if (Auth::user()->role == 'anggota')
                                        <a hidden href="/simpanan/{{ $s->id }}/edit" class="btn btn-warning">Edit</a>
                                        <div hidden>
                                        <form action="/simpanan/{{ $s->id }}" method="post" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Yakin akan menghapus data ?')">Delete</button>
                                        </form>
                                        </div>
                                        @else
                                        <a href="/simpanan/{{ $s->id }}/edit" class="btn btn-warning">Edit</a>
                                        <form action="/simpanan/{{ $s->id }}" method="post" class="d-inline">
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
        {{--  @elseif(Request::get('type') == 'pokok')
            <div class="card" id="tb_pokok">
                <div class="card-body">
                    <table class="table table-hover mt-4" id="myTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pokoks as $s)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $s->user->nama }} </td>
                                    <td> {{ $s->tipe }} </td>
                                    <td> {{ $s->nominal }} </td>
                                    <td> {{ $s->tanggal }} </td>
                                    <td>
                                        <a href="/simpanan/{{ $s->id }}/edit" class="btn btn-warning">Edit</a>
                                        <form action="/simpanan/{{ $s->id }}" method="post" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Yakin akan menghapus data ?')">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif  --}}
    </main>
    {{--
{{ $users->links('pagination::bootstrap-5') }} --}}
    {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        // Fungsi untuk menampilkan tabel berdasarkan pilihan
        function toggleTable(selectedOption) {
            if (selectedOption === 'wajib') {
                location.href = '/simpanan?type=wajib'
            } else if (selectedOption === 'pokok') {
                location.href = '/simpanan?type=pokok'
            }
        }

        // Tangkap elemen select
        const selectTipe = document.getElementById('tipe');

        // Panggil fungsi saat pilihan select berubah
        selectTipe.addEventListener('change', function() {
            toggleTable(this.value);
        });

        // Panggil fungsi saat halaman pertama kali dimuat
        toggleTable(selectTipe.value);
    </script>  --}}

@endsection
