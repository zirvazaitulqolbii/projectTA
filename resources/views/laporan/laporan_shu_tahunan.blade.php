@extends('layouts.master')

@section('content')
    <main class="container">
        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif

        <div class="card mt-5">
            <div class="card-header">
                Filter tahun
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""> Select tahun</label>
                                <select name="tahun" id="tahun" class="form-control">
                                  @for ($i = 2023; $i < date('Y') + 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                  @endfor
                                </select>
                                @if (Request::get('tahun'))
                                    <script>
                                        document.getElementById('tahun').value = '{{ Request::get("tahun") }}'
                                    </script>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">Lihat data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if (Request::get('tahun'))
        <div class="card mt-5">
            <div class="card-header">
                <h5>Pendapatan tahunan anggota, </h5>
                <a target="_blank" href="{{ route('cetak.laporan.shu', ['tahun' => Request::get('tahun')]) }}" class="btn btn-primary">Cetak SHU Tahunan</a>
            </div>
            <div class="card-body">
                <div class="alert alert-info" role="alert">
                    <h6>Total Pendapatan, <b>Tahun: {{ Request::get('tahun') }}</b>: </h6>
                <h5> <b>Rp {{ number_format($totalPendapatanTahunan ,0,',','.')}}</b></h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nip</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Total simpanan</th>
                                <th>Total pinjaman</th>
                                <th>SHU simpanan</th>
                                <th>SHU pinjaman</th>
                                <th>Jumlah Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($data as $item)
                            @php
                                $total += $item['jumlah_pendapatan'];
                            @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['nip'] }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['no_hp'] }}</td>
                                    <td>Rp {{ number_format($item['simpanan'],0,',','.') }}</td>
                                    <td>Rp {{ number_format($item['pinjaman'],0,',','.') }}</td>
                                    <td>Rp {{ number_format($item['shu_simpanan'],0,',','.') }}</td>
                                    <td>Rp {{ number_format($item['shu_transaksi'],0,',','.') }}</td>
                                    <td>Rp {{ number_format($item['jumlah_pendapatan'],0,',','.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="7" class="text-center"><h5>TOTAL</h5></th>
                                <th colspan="2" class="text-end"><h5>Rp {{ number_format(round($total),0,',','.') }}</h5></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </main>

@endsection
