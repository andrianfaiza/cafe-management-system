<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Detail;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('pelanggan','meja','detail.menu')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['detail.menu','pelanggan','meja']);
        return view('transaksi.show', compact('transaksi'));
    }

    public function create()
    {
        $meja = Meja::all();
        $menu = Menu::all();
        $pelanggan = Pelanggan::all();
        return view('transaksi.create', compact('menu','pelanggan','meja'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'meja_id' => 'required|exists:meja,id',
            'detail' => 'required|array|min:1',
            'detail.*.menu_id' => 'required|exists:menu,id',
            'detail.*.jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $header = Transaksi::create([
                'tanggal' => $request->tanggal,
                'pelanggan_id' => $request->pelanggan_id,
                'meja_id' => $request->meja_id,
                'total' => 0,
                'status' => 'pending',
            ]);

            $total = 0;
            foreach ($request->detail as $d) {
                $menu = Menu::find($d['menu_id']);
                $subtotal = $menu->harga * $d['jumlah'];

                Detail::create([
                    'transaksi_id' => $header->id,
                    'menu_id' => $d['menu_id'],
                    'jumlah' => $d['jumlah'],
                    'subtotal' => $subtotal,
                ]);

                $total += $subtotal;
            }

            $header->update(['total' => $total]);

            Meja::where('id', $request->meja_id)->update(['status' => 'terisi']);
        });

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }



    public function done(Transaksi $transaksi)
    {
        $transaksi->update(['status' => 'done']);
        Meja::where('id', $transaksi->meja_id)->update(['status' => 'tersedia']);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi Selesai');
    }
}