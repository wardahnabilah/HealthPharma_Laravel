<script setup>
    const { orderList, totalHarga } = defineProps(['orderList', 'totalHarga'])
    
</script>
<template>
    <section class="col-5 ps-4">
                <div class="border w-100" style="height: 32rem">
                    <div class="d-flex justify-content-between px-3 py-2 border-bottom">
                        <span>No. Pesanan 1</span>
                        <span>12 Agustus 2023</span>
                    </div>

                    <table class="table table-bordered text-center">
                        <thead class="table-dark fs-8">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="fs-7">
                            <tr v-for="(medicine, index) in orderList" :key="medicine.id">
                                <td>{{ index + 1 }}</td>
                                <td>{{ medicine.namaObat }}</td>
                                <td>{{ medicine.hargaSatuan }}</td>
                                <td>{{ medicine.jumlahObat }}</td>
                                <td>{{ medicine.subtotalHarga }}</td>
                                <td></td>
                            </tr>
                            <tr class="table-secondary">
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Total Harga</td>
                                <td colspan="2">Rp {{ totalHarga }},-</td>
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
</template>