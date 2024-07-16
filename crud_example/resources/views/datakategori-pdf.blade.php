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
    <title>Data Kategori</title>
</head>
<body>
    <h1>Kategori</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kode</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->nama }}</td>
                <td>{{ $kategori->kode }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h1>Powered by Mega Motor</h1>
</body>
</html>
