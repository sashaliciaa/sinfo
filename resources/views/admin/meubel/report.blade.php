<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Meubel</title>
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
                    <h2 style="margin: 0px">Laporan Data Meubel Desa Sindangmekar</h2>
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
                <td class="right">Total Meubeler : {{ $jumlah_meubeler_count }}</td>
            </tr>
            <tr>
                <td>Total Data : {{ $meubels->count() }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Jumlah Meubeler</th>
                <th>Jenis Meubel</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($meubels as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jumlah_meubeler }}</td>
                    <td>{{ $item->jenis_meubel }}</td>
                    <!-- Add more columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
