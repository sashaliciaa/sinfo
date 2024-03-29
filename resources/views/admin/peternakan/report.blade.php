<!-- resources/views/admin/peternakan/report.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Peternakan</title>
    <style>
        /* Atur gaya cetak sesuai kebutuhan Anda */
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
                    <h2 style="margin: 0px">Laporan Data Peternakan Desa Sindangmekar</h2>
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
                <td class="right">Jenis Ternak : {{ $jenis_ternak_count }}</td>
            </tr>
            <tr>
                <td>Total Data : {{ $peternakans->count() }}</td>
                <td class="right">Hewan Ternak : {{ $hewan_ternak_count }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Ternak</th>
                <th>Hewan Ternak</th>
                <th>Pakan</th>
                <th>Umur Ternak</th>
                <th>Berat Ternak</th>
                <th>Jumlah Ternak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peternakans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jenis_ternak }}</td>
                    <td>{{ $item->hewan_ternak }}</td>
                    <td>{{ $item->pakan }}</td>
                    <td>{{ $item->umur_ternak }} Tahun</td>
                    <td>{{ $item->berat_ternak }} Kg</td>
                    <td>{{ $item->jumlah_ternak }} Ekor</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
