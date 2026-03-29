@extends('layout.app')
@section('title', 'Pelanggan')
@section('content')
<div class="content">
    <div class="header">
        <h2>Pelanggan</h2>
        <a href="{{ route('pelanggan.create')}}" class="btn-tambah">+ Tambah Pelanggan</a>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Pelanggan</td>
                    <td>Umur</td>
                    <td>No HP</td>
                    <td>Alamat</td>
                    <td>Email</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                    @forelse ($pelanggan as $pelanggan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$pelanggan->nama}}</td>
                            <td>{{$pelanggan->umur}}</td>
                            <td>{{$pelanggan->no_hp}}</td>
                            <td>{{$pelanggan->alamat}}</td>
                            <td>{{$pelanggan->email}}</td>
                            <td class="table-action">
                                <a class="btn-edit" href="{{route('pelanggan.edit', $pelanggan->id)}}">Edit</a>
                                <form action="{{route('pelanggan.destroy', $pelanggan->id)}}" method="post" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="text-align: center">Tidak Ada Pelanggan</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
</div>