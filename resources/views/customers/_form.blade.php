<div class="form-group">
    <label for="nama">Name</label>
    <input type="text" id="nama" name="nama" placeholder="Enter Customer Name" required value="{{old('nama', $pelanggan->nama ?? '')}}">
</div>

<div class="form-group">
    <label for="umur">Age</label>
    <input type="number" id="umur" name="umur" placeholder="Enter Age" required value="{{old('umur', $pelanggan->umur ?? '')}}">
</div>

<div class="form-group">
    <label for="no_hp">Phone</label>
    <input type="text" id="no_hp" name="no_hp" placeholder="Enter Phone" required value="{{old('no_hp', $pelanggan->no_hp ?? '')}}">
</div>

<div class="form-group">
    <label for="alamat">Address</label>
    <input type="text" id="alamat" name="alamat" placeholder="Enter Address" required value="{{old('alamat', $pelanggan->alamat ?? '')}}">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Enter Email" required value="{{old('email', $pelanggan->email ?? '')}}">
</div>

<div class="action">
    <button type="submit" class="btn-submit">Save</button>
    <a href="{{route('customers.index')}}" class="btn-back">Back</a>
</div>