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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Laporan Data Peternakan</h2>

    <table>
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
                    <td>{{ $item->umur_ternak }}</td>
                    <td>{{ $item->berat_ternak }}</td>
                    <td>{{ $item->jumlah_ternak }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
