<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" placeholder="Masukan Nama Pelanggan" required value="{{old('nama', $pelanggan->nama ?? '')}}">
</div>

<div class="form-group">
    <label for="umur">Umur</label>
    <input type="number" id="umur" name="umur" placeholder="Masukan Umur" required value="{{old('umur', $pelanggan->umur ?? '')}}">
</div>

<div class="form-group">
    <label for="no_hp">No HP</label>
    <input type="text" id="no_hp" name="no_hp" placeholder="Masukan No HP" required value="{{old('no_hp', $pelanggan->no_hp ?? '')}}">
</div>

<div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat" placeholder="Masukan Alamat" required value="{{old('alamat', $pelanggan->alamat ?? '')}}">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Masukan Email" required value="{{old('email', $pelanggan->email ?? '')}}">
</div>

<div class="action">
    <button type="submit" class="btn-submit">Simpan</button>
    <a href="{{route('pelanggan.index')}}" class="btn-back">Kembali</a>
</div>