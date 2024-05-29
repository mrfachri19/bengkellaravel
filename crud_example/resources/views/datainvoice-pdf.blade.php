<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        h1 {
            text-align: center
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <table style="width:100%">
        <tr>
            <th>Nama Pelanggan</th>
            <td>{{ $service->user->name }}</td>
        </tr>
        <tr>
            <th>Tanggal Service</th>
            <td>{{ $service->tanggal }}</td>
        </tr>
        <tr>
            <th>Jam Service</th>
            <td>{{ $service->jam }}</td>
        </tr>
        <tr>
            <th>Kategori Service</th>
            <td>{{ $service->kategori->nama }}</td>
        </tr>
        <tr>
            <th>Sparepart</th>
            <td>{{ $service->sparepart->nama }}</td>
        </tr>
        <tr>
            <th>ToTal</th>
            <td>Rp. {{ $service->jumlah }}</td>
        </tr>
    </table>
    <h1>Powered by mega Motor</h1>
</body>

</html>
