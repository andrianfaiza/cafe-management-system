@extends('layout.app')
@section('title', 'Pelanggan')
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
                    <td>Tanggal</td>
                    <td>Nama Pelanggan</td>
                    <td>Nomor Meja</td>
                    <td>Total</td>
                    <td>Status</td>
                    <td>Aksi</td>
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
                            <td colspan="7" style="text-align: center">Tidak Ada Pelanggan</td>
                        </tr>
                        @endforelse
                        <tr>
                            <td colspan="2" style="text-align: left">
                                 <div class="action1">
                                    <a href="/" class="btn-back">Kembali</a>
                                    <a href="{{ route('transaksi.create')}}" class="btn-tambah">+ Tambah Pelanggan</a>
                                </div>
                            </td>
                        </tr>
            </tbody>
        </table>
    </div>
</div>