<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan SHU tahunan anggota</title>
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
            <h5 style="font-size: 18px;">LAPORAN SHU ANGGOTA TAHUNAN</h5>
        </div>

        <div>
            <table>
                <tr>
                    <td>Tahun</td>
                    <td>:</td>
                    <td><b>{{ $tahun }}</b></td>
                </tr>
                <tr>
                    <td>Total Pendapatan</td>
                    <td>:</td>
                    <td><b>Rp {{ number_format($totalPendapatanTahunan ,0,',','.')}}</b></td>
                </tr>
            </table>
            <br>
            <table border="1" style="width: 100%;border-collapse: collapse;font-size: 11px">
                <thead>
                    <tr>
                        <th style="height: 30px">No.</th>
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
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td style="text-align: center">{{ $item['nip'] }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['no_hp'] }}</td>
                            <td style="text-align: right">Rp {{ number_format($item['simpanan'],0,',','.') }}</td>
                            <td style="text-align: right">Rp {{ number_format($item['pinjaman'],0,',','.') }}</td>
                            <td style="text-align: right">Rp {{ number_format($item['shu_simpanan'],0,',','.') }}</td>
                            <td style="text-align: right">Rp {{ number_format($item['shu_transaksi'],0,',','.') }}</td>
                            <td style="text-align: right">Rp {{ number_format($item['jumlah_pendapatan'],0,',','.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="7" style="font-size: 16px;text-align: center; height: 30px;">TOTAL</th>
                        <th colspan="2" style="font-size: 16px;text-align: right">Rp {{ number_format($total,0,',','.') }}</th>
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
