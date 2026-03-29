<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="form-container">
        <div class="form">
            <form action="{{route('transaksi.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal">
                </div>
            <div class="form-group">
                <label for="pelanggan_id">Nama Pelanggan</label>
                <select name="pelanggan_id" id="pelanggan_id">
                    <option value="">Pilih Pelanggan</option>
                    @foreach ($pelanggan as $p)
                        <option value="{{$p->id}}">{{$p->nama}}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                <label for="meja_id">Nomor Meja</label>
                <select name="meja_id" id="meja_id">
                    <option value="">Pilih Nomor Meja</option>
                    @foreach ($meja as $meja)
                        <option value="{{$meja->id}}"
                            @if ($meja->status === 'terisi')
                                disabled
                            @endif>
                            {{$meja->no_meja}} --- {{$meja->status}}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>List Menu</label>
                <table>
                    <thead>
                        <tr>
                            <td>Menu</td>
                            <td>Jumlah</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="details">
                        <tr>
                            <td>
                                <select name="detail[0][menu_id]" id="menu_id" class="menu_id" required>
                                    <option value="">-- Pilih Menu --</option>
                                    @foreach ($menu as $m)
                                        <option value="{{$m->id}}" data-harga="{{$m->harga}}">{{$m->nama_menu}} | Rp.{{$m->harga}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="detail[0][jumlah]" id="jumlah" placeholder="Masukan Jumlah Menu" min="1">
                            </td>
                            <td>
                                <button type="button" id="remove" class="remove">X</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" id="add" class="add">+    </button>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" value="0" disabled>
            </div>
            <div class="action">
                <button type="submit" class="btn-submit">Simpan</button>
                <a href="{{ route('transaksi.index') }}" class="btn-back">Kembali</a>
            </div>
        </div>
    </div>
</form>

    {{-- Javascript --}}
    <script>

        // count total

        function hitung(){
            let total = 0;
            document.querySelectorAll('#details tr').forEach(tr =>{
                const select = tr.querySelector('.menu_id');
                const jumlah = tr.querySelector('#jumlah');
                if (select && jumlah){
                    const harga = parseFloat(select.selectedOptions[0]?.dataset.harga || 0);
                    const qty = parseInt(jumlah.value) || 0;
                    total += harga * qty;
                }
            });
            document.getElementById('total').value = total;
        }

        document.addEventListener('change', function(e) {
            if(e.target.classList.contains('menu-select') || e.target.type == 'number'){
                hitung();
            }
        });

        // for menu select
        let row = 1;

        document.getElementById('add').addEventListener('click', function(){
            const table = document.getElementById('details');
            const tr = document.createElement('tr');
            const options = `@foreach($menu as $m)<option value="{{ $m->id }}" data-harga="{{$m->harga}}">{{$m->nama_menu}} | Rp.{{$m->harga}}</option>@endforeach`;

            tr.innerHTML = `
                <td>
                    <select name="detail[${row}][menu_id]" id="menu_id" class="menu_id" required>
                        <option value="">-- Pilih Menu --</option>
                        ${options}
                    </select>
                </td>
                <td>
                    <input type="number" name="detail[${row}][jumlah]" id="jumlah" placeholder="Masukan Jumlah Menu" min="1">
                </td>
                <td>
                    <button type="button" class="remove">X</button>
                </td>
            `;
            table.appendChild(tr);
            row++;
        });

        document.addEventListener('click', function (e){
            if(e.target.classList.contains('remove')){
                e.target.closest('tr').remove();
            }
        });
    </script>
</body>
</html>