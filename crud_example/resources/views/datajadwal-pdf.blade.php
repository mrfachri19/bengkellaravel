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
    <title>Data jadwal</title>
</head>

<body>
    <h1>Jadwal</h1>
    <table>
        <thead>
            <tr>
                <th>Hari Kerja</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->day }}</td>
                    <td>{{ $jadwal->starttime }}</td>
                    <td>{{ $jadwal->endtime }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h1>Powered by Mega Motor</h1>
</body>

</html>
