<script setup>
    const { orderList, totalHarga } = defineProps(['orderList', 'totalHarga'])
    const emit = defineEmits(['deleteItem'])

    // Emit deleteItem
    function emitDeleteItem(id) {
        emit('deleteItem', id)
    }

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
                                <td>{{ medicine.jumlahBeli }}</td>
                                <td>{{ medicine.subtotalHarga }}</td>
                                <!-- Delete item button -->
                                <td>
                                    <button @click="()=>emitDeleteItem(medicine.id)" class="btn btn-danger btn-primary-xsm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                    </button>
                                </td>
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