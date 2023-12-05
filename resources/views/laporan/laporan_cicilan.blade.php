<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Cicilan anggota</title>
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
            <h4>Laporan Cicilan anggota <br>
            <span style="font-size: 20px">Koperasi <br>SMA Negeri 2 Batang Anai</span> <br>
            <span style="font-size: 12px; font-weight: 400">Jl. Tong Blau No. 69 Korong Kasai, KASANG, Kec. Batang Anai, Kab. Padang Pariaman Prov. Sumatera Barat <br>
            <span style="font-weight: 600">(0751) 462209 fax. 462205 Padang</span>
            </span>
            </h4>
        </div>
        <hr style="border: 1px solid black">
        <div style="text-align: center">
            <h5 style="font-size: 18px;">LAPORAN CICILAN ANGGOTA</h5>
        </div>

        <div>
            <br>
            <table border="1" style="width: 100%;border-collapse: collapse;font-size: 11px">
                <thead>
                    <tr>
                        <th style="height: 30px">No.</th>
                        <th>Nama</th>
                        <th>Id Pinjaman</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Bunga</th>
                        <th>Nominal cicilan</th>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($datacicilan as $index => $item)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $item->user->nama }} </td>
                        <td> {{ $item->id }} </td>
                        <td> {{ $item->tanggal_pembayaran }} </td>
                        <td> {{ $item->bunga }} </td>
                        <td> {{ $item->total }} </td>
                    </tr>
                    @endforeach
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


