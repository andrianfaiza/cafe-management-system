@extends('layout.app')
@section('title', 'Detail Pesanan')
@section('content')
<div class="content">
    <div class="header">
        <h2>List Data Transaksi</h2>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Menu</td>
                    <td>Jumlah</td>
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
                        <a href="{{ route('transaksi.index')}}" class="btn-back">Kembali</a>
                    </td>
                </tr>
                    </tbody>
                </table>
    </div>
</div>