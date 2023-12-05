<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan History pinjaman</title>
    <style>
        tr{
            height: 20px;
            padding: 2px;
        }
        td{
            height: 20px;
            padding: 2px;
        }
    </style>
</head>
<body onload="window.print()">
    <div style="padding-left: 30px; padding-right: 30px">
        <img src="../../assets/img/avatars/logosma.jpg" alt="logo" style="width: 5em; position: absolute;">
        <div style="text-align: center">
            <h4>Laporan Sisa Hasil Usaha <br>
            <span style="font-size: 20px">Koperasi <br>SMA Negeri 2 Batang Anai</span> <br>
            <span style="font-size: 12px; font-weight: 400">Jl. Tong Blau No. 69 Korong Kasai, KASANG, Kec. Batang Anai, Kab. Padang Pariaman Prov. Sumatera Barat <br>
            <span style="font-weight: 600">(0751) 462209 fax. 462205 Padang</span>
            </span>
            </h4>
        </div>
        <hr style="border: 1px solid black">
        <div style="text-align: center">
            <h5 style="font-size: 18px;">LAPORAN HISTORY PINJAMAN ANGGOTA</h5>
        </div>

        <div>
            <table style="font-size: 14px;width: 50%">
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
                    <td>Nominal pinjaman</td>
                    <td>:</td>
                    <td>Rp {{ number_format($pinjaman->nominal,0,',','.') }}</td>
                </tr>
                <tr>
                    <td>Total pembayaran</td>
                    <td>:</td>
                    <td>Rp {{ number_format($pinjaman->total,0,',','.') }} (+10% bunga)</td>
                </tr>
                <tr>
                    <td>Sisa pembayaran</td>
                    <td>:</td>
                    <td>Rp {{ number_format($sisa_pinjaman,0,',','.') }}</td>
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
            <br>
            <h5>Detail Cicilan</h5>
            <table border="1" style="width: 100%;border-collapse: collapse;font-size: 11px">
                <thead>
                    <tr>
                        <th style="height: 30px">NO.</th>
                        <th>TANGGAL PEMBAYARAN</th>
                        <th>NOMINAL CICILAN</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($pinjaman->cicilan()->orderBy('tanggal_pembayaran', 'ASC')->get() as $item)
                    @php
                        $total += $item->total;
                    @endphp
                    <tr>
                        <td style="text-align: center">Cicilan ke - {{ $loop->iteration }}</td>
                        <td style="text-align: center">{{ \Carbon\Carbon::parse($item->tanggal_pembayaran)->isoFormat('DD MMMM Y') }}</td>
                        <td style="text-align: right">Rp {{ number_format($item->total,0,',','.') }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="2" style="font-size: 16px;text-align: center; height: 30px;">TOTAL</th>
                        <th  style="font-size: 16px;text-align: right">Rp {{ number_format($total,0,',','.') }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div>
            <p style="font-size: 14px; margin-left: 70%">
            Padang, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('Y') }}
            <br>
            <br>
            <br>
            <br>
            <br>
            <span style="font-size: 14px"><u>ADMIN SISTEM</u> <br>
            </span>
            </p>
        </div>


    </div>
</body>
</html>
