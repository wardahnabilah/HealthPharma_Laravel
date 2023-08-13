<x-layout>
    <main>
        <div class="p-5 w-50 mx-auto rounded-4 shadow">
            <h1 class="fs-4 fw-bold text-center mb-5">Edit Obat</h1>
            <form action="" class="d-flex flex-column gap-3 mx-auto">
                <table class="table table-borderless align-middle">
                    <tr>
                        <th class="col-3">Nama Obat</th>
                        <th>:</th>
                        <td>
                            <input type="text" name="namaObat" id="nama-obat" class=" form-control" placeholder="Nama Obat">
                        </td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <th>:</th>
                        <td>
                            <input type="text" name="stokObat" id="nama-obat" class=" form-control" placeholder="1">
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <th>:</th>
                        <td>
                            <input type="text" name="hargaObat" id="nama-obat" class=" form-control" placeholder="Rp 10.000, -">
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Expired</th>
                        <th>:</th>
                        <td>
                            <input type="text" name="expiredObat" id="nama-obat" class=" form-control" placeholder="17 - 08 - 2023">
                        </td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <th>:</th>
                        <td class="d-flex gap-3 align-items-center">
                            <img src="/fallback_img.jpg" class="card-img rounded-4" alt="">
                            <input type="file" name="gambarObat" id="nama-obat" class="w-50" placeholder="17 - 08 - 2023">
                        </td>
                    </tr>
                </table>
                <button class="btn btn-primary mt-4 text-uppercase fs-btn fw-semibold">Simpan</button>
            </form> 
        </div>
    </main>
</x-layout>