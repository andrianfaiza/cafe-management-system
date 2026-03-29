<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function index(){
        $menu = Menu::all();
        return view('menu.index', compact('menu'));
    }

    public function create(){
        return view('menu.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'jenis' => 'required|in:makanan,minuman',
            'harga' => 'required|numeric|min:0',
        ]);

        Menu::create($validated);
        return redirect()->route("menu.index");
    }

    public function edit(Menu $menu){
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu){
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'jenis' => 'required|in:makanan,minuman',
            'harga' => 'required|numeric|min:0',
        ]);

        $menu->update($validated);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy(Menu $menu){
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
    }
}
