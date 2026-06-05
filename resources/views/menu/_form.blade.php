<div class="form-group">
    <label for="nama_menu">Menu Name</label>
    <input type="text" id="nama_menu" name="nama_menu" placeholder="Enter Menu Name" required value="{{ old('nama_menu', $menu->nama_menu ?? '')}}">
</div>

<div class="form-group">
    <label for="jenis">Type</label>
    <select name="jenis" id="jenis">
        <option value="" disabled>Select Menu Type</option>
        <option value="makanan" {{old('jenis') == 'makanan' ? 'selected' : ''}}>Food</option>
        <option value="minuman" {{ old('jenis') == 'minuman' ? 'selected' : ''}}>Drink</option>
    </select>
</div>

<div class="form-group">
    <label for="harga">Price</label>
    <input type="number" name="harga" id="harga" placeholder="Enter price" required value="{{old('harga', $menu->harga ?? '')}}">
</div>

<div class="action">
    <button type="submit" class="btn-submit">Save</button>
    <a href="{{route('menu.index')}}" class="btn-back">Back</a>
</div>