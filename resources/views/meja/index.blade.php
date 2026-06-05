@extends('layout.app')
@section('title', 'Tables')
@section('content')
<div class="content">
    <div class="header">
        <h2>Tables</h2>
        <form action="{{ route('meja.store')}}" method="post">
            @csrf
            <input type="text" id="no_meja" name="no_meja" placeholder="Enter Table Number" required>
            <button type="submit" class="btn-submit">+ Add</button>
        </form>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Table Number</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                    @forelse ($meja as $meja)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$meja->no_meja}}</td>
                            <td>{{ $meja->status === 'terisi' ? 'Occupied' : 'Available' }}</td>
                            <td class="table-action">
                                <form action="{{route('meja.destroy', $meja->id)}}" method="post" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center">No tables available</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
</div>