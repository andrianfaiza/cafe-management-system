@extends('layout.app')
@section('title', 'Transactions')
@section('content')
<div class="content">
    <div class="header">
        <h2>Transaction List</h2>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Date</td>
                    <td>Customer Name</td>
                    <td>Table Number</td>
                    <td>Total</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksi as $transaksi)
                <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ isset($transaksi->tanggal) ? $transaksi->tanggal->format('Y-m-d') : ''}}</td>
                            <td>{{$transaksi->pelanggan->nama}}</td>
                            <td>{{$transaksi->meja->no_meja}}</td>
                            <td>{{$transaksi->total}}</td>
                            <td>
                                @if (($transaksi->status ?? 'pending') === 'done') 
                                    <span class="badge">Done</span>
                                @else
                                <form action="{{ route('transaksi.done', $transaksi->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn-done">Done</button>
                                </form>
                                @endif
                            </td>
                            <td class="action">
                                <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn-tambah">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="text-align: center">No transactions available</td>
                        </tr>
                        @endforelse
                        <tr>
                            <td colspan="2" style="text-align: left">
                                 <div class="action1">
                                    <a href="/" class="btn-back">Back</a>
                                    <a href="{{ route('transaksi.create')}}" class="btn-tambah">+ Add Transaction</a>
                                </div>
                            </td>
                        </tr>
            </tbody>
        </table>
    </div>
</div>