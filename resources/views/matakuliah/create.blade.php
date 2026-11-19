<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            margin-bottom: 25px;
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 7px;
        }
        input {
            width: 280px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 7px 15px;
            cursor: pointer;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

    <h1>Tambah Data Mata Kuliah</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf

        <div>
            <label>Kode Mata Kuliah</label>
            <input type="text" name="kode_matakuliah"
                   value="{{ old('kode_matakuliah') }}">

            @error('kode_matakuliah')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Nama Mata Kuliah</label>
            <input type="text" name="nama_matakuliah"
                   value="{{ old('nama_matakuliah') }}">

            @error('nama_matakuliah')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Jumlah SKS</label>
            <input type="number" name="sks" min="1" max="6"
                   value="{{ old('sks') }}">

            @error('sks')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Simpan</button>

    </form>

</body>
</html>
