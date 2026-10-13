<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }

        nav {
            padding: 15px;
            background: #eee;
            margin-bottom: 30px;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
        }
    </style>
</head>

<body>

@include('navbar')

<nav>
    <a href="/profil">Profil</a>
    <a href="/mahasiswa">Daftar Mahasiswa</a>
</nav>


@yield('content')


</body>
</html>