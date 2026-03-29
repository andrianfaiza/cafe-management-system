<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="form-container">
        <div class="form">
            <h2>Edit Pelanggan</h2>
            <form action="{{ route('pelanggan.update', $pelanggan->id)}}" method="POST">
                @csrf
                @method('PUT')
                @include('pelanggan._form')
            </form>
        </div>
    </div>
</body>
</html>