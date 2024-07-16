<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        h1 {
            text-align: center;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <title>Data Sparepart</title>
</head>
<body>
    <h1>Sparepart</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($spareparts as $sparepart)
            <tr>
                <td>{{ $sparepart->nama }}</td>
                <td>{{ $sparepart->harga }}</td>
                <td>{{ $sparepart->jumlahsatuan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h1>Powered by Mega Motor</h1>
</body>
</html>
