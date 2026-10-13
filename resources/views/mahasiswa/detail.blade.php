@extends('layouts.app')


@section('title')
Detail Mahasiswa
@endsection


@section('content')

<h1>Detail Mahasiswa</h1>


<p>
Nama : {{ $mahasiswa['nama'] }}
</p>


<p>
NIM : {{ $mahasiswa['nim'] }}
</p>


<p>
IPK : {{ $mahasiswa['ipk'] }}
</p>


@endsection