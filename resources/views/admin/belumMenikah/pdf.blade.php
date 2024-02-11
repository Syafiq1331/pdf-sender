<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar SK Belum Menikah</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
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
    <h2>Daftar SK Belum Menikah</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Verifikasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $skBelumMenikah->nama }}</td>
                <td>{{ $skBelumMenikah->nik }}</td>
                <td>{{ $skBelumMenikah->tempat_lahir }}</td>
                <td>{{ $skBelumMenikah->tanggal_lahir }}</td>
                <td>{{ $skBelumMenikah->jenis_kelamin }}</td>
                <td>{{ $skBelumMenikah->alamat }}</td>
                <td>{{ $skBelumMenikah->status }}</td>
                <td>{{ $skBelumMenikah->verifikasi }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
