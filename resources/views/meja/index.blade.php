@extends('layout.app')
@section('title', 'Meja')
@section('content')
<div class="content">
    <div class="header">
        <h2>Meja</h2>
        <form action="{{ route('meja.store')}}" method="post">
            @csrf
            <input type="text" id="no_meja" name="no_meja" placeholder="Tambah Nomor Meja" required>
            <button type="submit" class="btn-submit">+ Tambah</button>
        </form>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>No Meja</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                    @forelse ($meja as $meja)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$meja->no_meja}}</td>
                            <td>{{$meja->status}}</td>
                            <td class="table-action">
                                <form action="{{route('meja.destroy', $meja->id)}}" method="post" style="display: inline">
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