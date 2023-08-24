<script setup>
    import SearchMedicine from './SearchMedicine.vue';
    import OrderListTable from './OrderListTable.vue';
    import { ref } from 'vue';
    import { computed } from 'vue'


    const orderList = ref([]);
    const isClicked = ref([])

    // Add item to orderList
    function addOrderItem(medicineQty, medicine) {
     
        const orderItem = {
            id: medicine.id,
            namaObat: medicine.nama_obat,
            hargaSatuan: medicine.harga,
            jumlahBeli: medicineQty,
            subtotalHarga: medicine.harga * medicineQty
        }

        // Check whether the item is already added or not and the quantity input is not empty
        const alreadyAdded = orderList.value.some(item => item.namaObat == orderItem.namaObat) 

        if(medicineQty!= '' && !alreadyAdded) {
            orderList.value.push(orderItem)
            isClicked.value.push(orderItem.id)
        }
    }

    // Delete item in orderList
    function deleteOrderItem(id) {
        orderList.value = orderList.value.filter(item => item.id !== id)
        isClicked.value = isClicked.value.filter(itemId => itemId !== id)
    }

    // Total harga
    const totalHarga = computed(() => {
        return orderList.value.reduce((total, item) => total + item.subtotalHarga, 0)
    })
    
</script>
<template>
    <div class="row" >
        <SearchMedicine 
            @addSearchedItem="addOrderItem" 
            :isClicked="isClicked"
        />
        <OrderListTable 
            @deleteItem="deleteOrderItem" 
            :orderList="orderList" 
            :totalHarga="totalHarga"
        />
    </div>
</template>