@extends('layout.app')
@section('title', 'Menu')
@section('content')
<div class="content">
    <div class="header">
        <h2>Menu Items</h2>
        <a href="{{ route('menu.create')}}" class="btn-tambah">+ Add Menu</a>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Menu Name</td>
                    <td>Type</td>
                    <td>Price</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                    @forelse ($menu as $menu)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$menu->nama_menu}}</td>
                            <td>{{ $menu->jenis === 'makanan' ? 'Food' : 'Drink' }}</td>
                            <td>{{$menu->harga}}</td>
                            <td class="table-action">
                                <a class="btn-edit" href="{{route('menu.edit', $menu->id)}}">Edit</a>
                                <form action="{{route('menu.destroy', $menu->id)}}" method="post" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center">No menu items available</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
</div>