<x-layout>
    <main class="container">
        <div class="d-flex justify-content-between">
            <h3 class="mb-4">Buat Transaksi Baru</h3>
            <p class="login-as">Login sebagai: <span class="fw-bold">{{auth()->user()->username}}</span></p>
        </div>
        <div class="row">
            <section class="col-7 pe-3 border-end">
                <form action="">
                    <input type="text" name="username_login" class="form-control" placeholder="Search">
                </form>
                {{-- List Obat --}}
                <div class="mt-4 d-flex flex-wrap gap-4 fs-6">
                    {{-- Card --}}
                    <div class="d-flex gap-3 shadow rounded-4 overflow-hidden" style="width: 19rem; height: 10.5rem">
                        <img src="/fallback_img.jpg" class="card-img" alt="Gambar Obat">
                        <div class="d-flex flex-column justify-content-center">
                            <p class="mb-1 fw-bold">Vitamin C</p>
                            <p class="mb-2">Rp 20.000,-</p>
                            <p class="mb-3">Stok: 25</p>
                            <div class="d-flex gap-2">
                                <input type="number" min="1" class="form-control w-form-sm text-center" placeholder="1">
                                <button class="btn btn-primary btn-primary-sm">Tambah</button>        
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-5 ps-4">
                <div class="border w-100" style="height: 32rem">
                    <div class="d-flex justify-content-between px-3 py-2 border-bottom">
                        <span>No. Pesanan 1</span>
                        <span>12 Agustus 2023</span>
                    </div>

                    <table class="table table-bordered text-center fs-7">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Vitamin C</td>
                                <td>5.000</td>
                                <td>2</td>
                                <td>10.000</td>
                                <td></td>
                            </tr>
                            <tr class="table-secondary">
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Total Harga</td>
                                <td colspan="2">Rp 34.000,-</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Total Bayar</td>
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-secondary w-100 mt-5">TAMBAH</button>
                </div>
            </section>
        </div>
    </main>
</x-layout>