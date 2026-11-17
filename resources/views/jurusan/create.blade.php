<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jurusan</title>
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
        a {
            margin-left: 8px;
        }
    </style>
</head>
<body>
    <h1>Tambah Data Jurusan</h1>
    <form action="{{ route('jurusan.store') }}" method="POST">
        @csrf
        <div>
            <label>Kode Jurusan</label>
            <input type="text" name="kode"
                   value="{{ old('kode') }}">
            @error('kode')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Nama Jurusan</label>
            <input type="text" name="nama"
                   value="{{ old('nama') }}">
            @error('nama')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Simpan</button>
        <a href="{{ route('jurusan.index') }}">Kembali</a>
    </form>
</body>
</html>
