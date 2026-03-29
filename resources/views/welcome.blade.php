<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
    <div class="wrapper">
    <div class="sidebar">
        <span>MyCafe</span> &nbsp;&nbsp;
        <a href="{{ route('menu.index')}}" class="btn-menu">Menu</a>
        <a href="{{ route('meja.index')}}" class="btn-menu">Meja</a>
        <a href="{{route('pelanggan.index')}}" class="btn-menu">Pelanggan</a>
        <a href="{{ route('transaksi.index')}}" class="btn-menu">Transaksi</a>
    </div>

    <div class="content">
        <h1>Selamat Datang di Dashboard</h1>
        <p>Pilih menu di sidebar untuk mengelola data Menu, Meja, Pelanggan, Transaksi.</p>
    </div>
</div>
</body>
</html>