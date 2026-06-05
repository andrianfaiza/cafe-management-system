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
        <a href="{{ route('tables.index')}}" class="btn-menu">Tables</a>
        <a href="{{route('customers.index')}}" class="btn-menu">Customers</a>
        <a href="{{ route('transactions.index')}}" class="btn-menu">Transactions</a>
    </div>

    <div class="content">
        <h1>Welcome to the Dashboard</h1>
        <p>Select a sidebar item to manage Menu, Tables, Customers, and Transactions.</p>
    </div>
</div>
</body>
</html>