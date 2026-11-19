<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Mata Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 500px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            width: 180px;
        }
        a {
            display: inline-block;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h1>Detail Mata Kuliah</h1>
    <table>
        <tr>
            <th>Kode Mata Kuliah</th>
            <td>{{ $matakuliah->kode_matakuliah }}</td>
        </tr>

        <tr>
            <th>Nama Mata Kuliah</th>
            <td>{{ $matakuliah->nama_matakuliah }}</td>
        </tr>

        <tr>
            <th>Jumlah SKS</th>
            <td>{{ $matakuliah->sks }}</td>
        </tr>

        <tr>
            <th>Tanggal Dibuat</th>
            <td>{{ $matakuliah->created_at }}</td>
        </tr>

        <tr>
            <th>Tanggal Diperbarui</th>
            <td>{{ $matakuliah->updated_at }}</td>
        </tr>
    </table>

    <a href="{{ route('matakuliah.index') }}">Kembali</a>

</body>
</html>