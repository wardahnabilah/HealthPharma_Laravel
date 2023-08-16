<x-layout>
    <main>
        <div class="p-5 w-50 mx-auto rounded-4 shadow">
            <h1 class="fs-4 fw-bold text-center mb-5">Tambah Obat</h1>
            <form action="/add-medicine" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-3 mx-auto">
                @csrf
                <table class="table table-borderless align-middle">
                    <tr>
                        <th class="col-3">Nama Obat</th>
                        <th>:</th>
                        <td>
                            <input type="text" value="{{old('namaObat')}}" name="namaObat" id="namaObat" class=" form-control" placeholder="Nama Obat">
                            @error('namaObat')
                                <div class="error-message">{{$message}}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <th>:</th>
                        <td>
                            <input type="number" value="{{old('stokObat')}}" name="stokObat" id="stokObat" min="0" class=" form-control" placeholder="1">
                            @error('stokObat')
                                <div class="error-message">{{$message}}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <th>:</th>
                        <td>
                            <input type="number" value="{{old('hargaObat')}}" name="hargaObat" id="nama-obat" class=" form-control" placeholder="Rp 10.000, -">
                            @error('hargaObat')
                                <div class="error-message">{{$message}}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Expired</th>
                        <th>:</th>
                        <td>
                            <input type="date" value="{{old('expiredObat')}}" name="expiredObat" id="nama-obat" class=" form-control" placeholder="17 - 08 - 2023">
                            @error('expiredObat')
                                <div class="error-message">{{$message}}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <th>:</th>
                        <td class="d-flex gap-3 align-items-center">
                            <img src="/fallback_img.jpg" class="card-img rounded-4" alt="">
                            <input type="file" name="gambarObat" id="nama-obat" class="w-50" placeholder="17 - 08 - 2023">
                            @error('gambarObat')
                                <div class="error-message">{{$message}}</div>
                            @enderror
                        </td>
                    </tr>
                </table>
                <button class="btn btn-primary mt-4 text-uppercase fs-btn fw-semibold">Simpan</button>
            </form> 
        </div>
    </main>
</x-layout>