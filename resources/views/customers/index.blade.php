@extends('layout.app')
@section('title', 'Customers')
@section('content')
<div class="content">
    <div class="header">
        <h2>Customers</h2>
        <a href="{{ route('customers.create')}}" class="btn-tambah">+ Add Customer</a>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Customer Name</td>
                    <td>Age</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Email</td>
                    <td>Action</td>
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
                                <a class="btn-edit" href="{{route('customers.edit', $pelanggan->id)}}">Edit</a>
                                <form action="{{route('customers.destroy', $pelanggan->id)}}" method="post" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="text-align: center">No customers available</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
</div>