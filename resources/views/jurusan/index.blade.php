<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Jurusan</title>
</head>
<body>

    <h1>Daftar Jurusan</h1>

    @if (session('success'))
        <p style="color:green">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('jurusan.create') }}">Tambah Jurusan</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Jurusan</th>
                <th>Dibuat</th>
                <th>Detail</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($jurusans as $jurusan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jurusan->kode }}</td>
                    <td>{{ $jurusan->nama }}</td>
                    <td>{{ $jurusan->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('jurusan.show', $jurusan->id) }}">
                            Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data jurusan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
