<!DOCTYPE html>
<html>
<head>
    <title>Laporan Sisa Hasil Usaha</title>
    <br>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            width: 100%;
            max-width: 800px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Sisa Hasil Usaha</h1>
        {{-- <h3>simpanan wajib dan simpanan pokok</h3> --}}

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Id Pinjaman</th>
                    <th>Nominal</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Bunga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datacicilan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->user->nama }}</td>
                    <td>{{ $item->pinjaman_id }}</td>
                    <td>{{ $item->nominal }}</td>
                    <td>{{ $item->tanggal_pembayaran }}</td>
                    <td>{{ $item->bunga }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
