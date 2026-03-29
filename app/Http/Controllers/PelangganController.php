<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\View\View;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|numeric|min:0',
            'no_hp' => 'required|string|max:12',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        Pelanggan::create($validated);
        return redirect()->route('pelanggan.index');
    }

    public function edit(Pelanggan $pelanggan){
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan){
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|numeric|min:0',
            'no_hp' => 'required|string|max:12',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        $pelanggan->update($validated);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui');
    }

    public function destroy(Pelanggan $pelanggan){
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus');
    }
}
