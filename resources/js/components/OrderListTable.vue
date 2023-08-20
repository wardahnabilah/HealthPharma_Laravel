<script setup>
    import TransactionOverlay from './TransactionOverlay.vue'
    import { ref } from 'vue';
    import { currentDate, formattedCurrentDate } from '../utils/dateUtil.js';

    const { orderList, totalHarga } = defineProps(['orderList', 'totalHarga'])
    const emit = defineEmits(['deleteItem'])
    const jumlahBayar = ref()
    const kembalian = ref(0)
    const transactionData = ref({})

    function calculateKembalian(total) {
        if(jumlahBayar.value > total) {
            kembalian.value = jumlahBayar.value - total
        } else{
            kembalian.value = 0
        }
    }

    // Emit deleteItem
    function emitDeleteItem(id) {
        emit('deleteItem', id)
    }

    // Store in database
    async function storeInDatabase(total, orderList) {
        const requestData = {
            tanggalTransaksi: currentDate(),
            totalHarga: total,
            jumlahBayar: jumlahBayar.value,
            kembalian: kembalian.value,
            orderList: orderList
        }
        
        try {
            const response = await axios.post('/add-transaction', requestData)
            console.log(response.data);

            transactionData.value = requestData
        } catch(err) {
            console.log(err);
        }
    }
</script>
<template>
    <section class="col-5 ps-4">
                <div class="border w-100" style="height: 32rem">
                    <div class="d-flex justify-content-between px-3 py-2 border-bottom">
                        <span></span>
                        <span>{{ formattedCurrentDate() }}</span>
                    </div>

                    <table class="table table-bordered text-center">
                        <thead class="table-dark fs-8">
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-3">Nama Barang</th>
                                <th class="col-3">Harga Satuan</th>
                                <th class="col-1">Jumlah</th>
                                <th class="col-2">Subtotal</th>
                                <th class="col-1"></th>
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
                                <td colspan="2">
                                    <input @input="()=>calculateKembalian(totalHarga, orderList)" :disabled="orderList.length == 0" class="w-100 text-center text-inherit" type="number" v-model="jumlahBayar">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Kembalian</td>
                                <td colspan="2">Rp {{ kembalian }},-</td>
                            </tr>
                        </tbody>
                    </table>
                    <button @click="()=>storeInDatabase(totalHarga, orderList)" :class="orderList.length && jumlahBayar ? '' : 'disabled'" class="btn btn-secondary w-100 mt-5" type="button" data-bs-toggle="modal" data-bs-target="#receipt">TAMBAH</button>
                    <TransactionOverlay :id="'receipt'" :transactionData="transactionData" />
                </div>
            </section>
</template>