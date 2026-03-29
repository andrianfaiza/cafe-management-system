<div class="form-group">
    <label for="nama_menu">Nama Menu</label>
    <input type="text" id="nama_menu" name="nama_menu" placeholder="Masukan Nama Menu" required value="{{ old('nama_menu', $menu->nama_menu ?? '')}}">
</div>

<div class="form-group">
    <label for="jenis">Jenis</label>
    <select name="jenis" id="jenis">
        <option value="" disabled>Pilih Jenis Menu</option>
        <option value="makanan" {{old('jenis') == 'makanan' ? 'selected' : ''}}>makanan</option>
        <option value="minuman" {{ old('jenis') == 'minuman' ? 'selected' : ''}}>minuman</option>
    </select>
</div>

<div class="form-group">
    <label for="harga">harga</label>
    <input type="number" name="harga" id="harga" placeholder="Masukan harga makanan" required value="{{old('harga', $menu->harga ?? '')}}">
</div>

<div class="action">
    <button type="submit" class="btn-submit">Simpan</button>
    <a href="{{route('menu.index')}}" class="btn-back">Kembali</a>
</div>