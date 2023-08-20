<script setup>
    import { formattedCurrentDate } from '../utils/dateUtil.js';

    const { id, transactionData } = defineProps(['id', 'transactionData'])

    function reloadPage() {
        location.reload()
    }

    function printReceipt() {
        window.print()
    }
</script>
<template>
    <div class="modal fade" :id="id" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 mx-auto" id="staticBackdropLabel">Bukti Transaksi</h1>
            </div>
            <div class="modal-body" id="printedArea">
                <div class="d-flex justify-content-between border-bottom">
                    <div class="mb-2">
                        <img width="200" src="/healthpharma-logo.png" alt="">
                        <p class="fs-8 m-0 ps-3">Jl. Kucing Putih no 23</p>
                        <p class="fs-8 m-0 ps-3">08123456778</p>
                    </div>
                    <div class="mt-3 me-2 fs-7">Tanggal: {{ formattedCurrentDate() }}</div>
                </div>
                <table class="table table-borderless">
                    <thead class="fs-8">
                        <tr class="text-center">
                            <th class="col-1">No</th>
                            <th class="col-3">Nama Barang</th>
                            <th class="col-3">Harga Satuan</th>
                            <th class="col-1">Jumlah</th>
                            <th class="col-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="fs-7">
                        <tr v-for="(medicine, index) in transactionData.orderList" :key="medicine.id">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td class="text-center">{{ medicine.namaObat }}</td>
                            <td class="text-center">{{ medicine.hargaSatuan }}</td>
                            <td class="text-center">{{ medicine.jumlahBeli }}</td>
                            <td class="text-end">{{ medicine.subtotalHarga }}</td>
                        </tr>
                        <tr class="border-top border-bottom">
                            <td colspan="6"></td>
                        </tr>
                        <tr class="text-end">
                            <td colspan="2"></td>
                            <td colspan="1">Total Harga</td>
                            <td colspan="2 text-end">Rp {{ transactionData.totalHarga }},-</td>
                        </tr>
                        <tr class="text-end">
                            <td colspan="2"></td>
                            <td colspan="1">Total Bayar</td>
                            <td colspan="2">
                                {{ transactionData.jumlahBayar }}
                            </td>
                        </tr>
                        <tr class="text-end">
                            <td colspan="2"></td>
                            <td colspan="1">Kembalian</td>
                            <td colspan="2">Rp {{ transactionData.kembalian }},-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button @click="reloadPage" data-bs-dismiss="modal" type="button" class="btn btn-secondary btn-secondary ghost">Tutup</button>
                <button @click="printReceipt" type="button" class="btn btn-primary">Cetak</button>
            </div>
            </div>
        </div>
    </div>
</template>