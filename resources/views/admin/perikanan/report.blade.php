<!-- resources/views/admin/perikanan/report.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Perikanan</title>
    <style>
        /* Adjust the printing style as needed */
        body {
            font-family: Arial, sans-serif;
        }

        .table-data th,
        .table-data td {
            border: 1px solid #e2e2e2;
        }

        .table-total th,
        .table-total td {
            margin: 0px;
            padding: 2px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: none;
            margin-bottom: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .right {
            text-align: right;
        }
    </style>
</head>

<body>

    <table>
        <tbody>
            <tr>
                <td>
                    <h2 style="margin: 0px">Laporan Data Perikanan Desa Sindangmekar</h2>
                    <small>Dukupuntang, Cirebon, Jawa Barat, Indonesia . </small>
                </td>
                <td class="right" style="width: 50%">
                    <img style="width: 20%" src="{{ public_path('assets/img/logo.png') }}" alt="Logo Desa Sindangmekar">
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <table class="table-total">
        <tbody>
            <tr>
                <td><b>Dicetak</b> </td>
                <td class="right"><b>Total</b></td>
            </tr>
            <tr>
                <td>{{ Auth::user()->nama_awal }} {{ Auth::user()->nama_akhir }} - {{ date('d F Y') }}</td>
                <td class="right">Jenis Ikan : {{ $jenis_ikan_count }}</td>
            </tr>
            <tr>
                <td>Total Data : {{ $perikanans->count() }}</td>
                <!-- Add other relevant total data as needed -->
            </tr>
        </tbody>
    </table>

    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Ikan</th>
                <th>Pakan</th>
                <th>Jumlah Ikan</th>
                <th>Berat Ikan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perikanans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jenis_ikan }}</td>
                    <td>{{ $item->pakan }}</td>
                    <td>{{ $item->jumlah_ikan }} Ekor</td>
                    <td>{{ $item->berat_ikan }} Kg</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
