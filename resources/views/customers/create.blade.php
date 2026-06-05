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
            <h2>Add Customer</h2>
            <form action="{{route('customers.store')}}" method="POST">
                @csrf
                @include('customers._form')
            </form>
            
        </div>
    </div>
</body>
</html>