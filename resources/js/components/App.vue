<script setup>
    import SearchMedicine from './SearchMedicine.vue';
    import OrderListTable from './OrderListTable.vue';
    import { ref } from 'vue';
    import { computed } from 'vue'


    const orderList = ref([]);

    // Add item to orderList
    function addOrderItem(medicineQty, medicine) {
        // const orderItemQty = event.target.orderItemQty.value
        
        const orderItem = {
            id: medicine.id,
            namaObat: medicine.nama_obat,
            hargaSatuan: medicine.harga,
            jumlahObat: medicineQty,
            subtotalHarga: medicine.harga * medicineQty
        }

        // Check whether the item is already added or not and the quantity input is not empty
        const alreadyAdded = orderList.value.some(item => item.namaObat == orderItem.namaObat) 

        if(medicineQty!= '' && !alreadyAdded) {
            orderList.value.push(orderItem)
        }
    }

    // Total harga
    const totalHarga = computed(() => {
        return orderList.value.reduce((total, item) => total + item.subtotalHarga, 0)
    })
    
</script>
<template>
    <div class="row" >
        <SearchMedicine @addSearchedItem="addOrderItem"/>
        <OrderListTable :orderList="orderList" :totalHarga="totalHarga"/>
    </div>
</template>