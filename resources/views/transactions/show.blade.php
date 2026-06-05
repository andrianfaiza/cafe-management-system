@extends('layout.app')
@section('title', 'Order Details')
@section('content')
<div class="content">
    <div class="header">
        <h2>Transaction Details</h2>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Menu Name</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi->detail as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->menu->nama_menu }}</td>
                    <td>{{ $d->jumlah }}</td>
                    <td>{{ $d->subtotal }}</td>
                </tr>
                @endforeach
                <tr>
                    <td>
                        <a href="{{ route('transactions.index')}}" class="btn-back">Back</a>
                    </td>
                </tr>
                    </tbody>
                </table>
    </div>
</div>