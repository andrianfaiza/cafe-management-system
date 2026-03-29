<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div class="form-container">
        <div class="form">

            <h2>Tambah Data Menu</h2>
            <form action="{{ route('menu.store')}}" method="post">
                @csrf
                
                @include('menu._form')
            </form>
        </div>
    </div>
</body>
</html>