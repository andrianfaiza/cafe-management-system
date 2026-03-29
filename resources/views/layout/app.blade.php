<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div class="container">
        <div class="topbar">
            <h3>Cafe Management System</h3>
            <ul>
                <li><a href="{{ route('menu.index')}}">Menu</a></li>
                <li><a href="{{ route('meja.index')}}">Meja</a></li>
                <li><a href="{{route('pelanggan.index')}}">Pelanggan</a></li>
                <li><a href="{{ route('transaksi.index')}}">Transaksi</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="data-table">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>