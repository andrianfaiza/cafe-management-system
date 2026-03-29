@extends('layout.app')
@section('title', 'Menu')
@section('content')
<div class="content">
    <div class="header">
        <h2>Menu</h2>
        <a href="{{ route('menu.create')}}" class="btn-tambah">+ Tambah Menu</a>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Menu</td>
                    <td>Jenis</td>
                    <td>Harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                    @forelse ($menu as $menu)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$menu->nama_menu}}</td>
                            <td>{{$menu->jenis}}</td>
                            <td>{{$menu->harga}}</td>
                            <td class="table-action">
                                <a class="btn-edit" href="{{route('menu.edit', $menu->id)}}">Edit</a>
                                <form action="{{route('menu.destroy', $menu->id)}}" method="post" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center">Tidak Ada Menu</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
</div>