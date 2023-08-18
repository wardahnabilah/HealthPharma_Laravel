<script setup>
    import { ref } from 'vue';

    const medicines = ref([])
    const searchKeyword = ref('')
    const searchTimeout = ref('')
    const emit = defineEmits(['addSearchedItem'])
    
    function searchMedicine() {
        // If there is no keyword 
        if(searchKeyword.value == '') {
            clearTimeout(searchTimeout.value)

            hideSearchResult()
            hideLoading()
        } 
        // If user starts typing something
        else {
            clearTimeout(searchTimeout.value)

            hideSearchResult()
            showLoading()

            try {
                searchTimeout.value = setTimeout(() => getMedicine(), 600)
            } catch(err) {
                console.log(err);
            }
        }
    }

    // Get the medicines data from database
    async function getMedicine() {
        const response = await axios.get(`/search/${searchKeyword.value}`)
        
        medicines.value = response.data
        
        hideLoading()
        showSearchResult()
    }

    // Emit addSearchedIte
    function emitAddSearchedItem(event, medicine) {
        const medicineQty = event.target.orderItemQty.value

        emit('addSearchedItem', medicineQty, medicine)
    }

    function showLoading() {
        document.querySelector(".loading").classList.remove('hide')
    }

    function hideLoading() {
        document.querySelector(".loading").classList.add('hide')
    }

    function hideSearchResult() {
        document.querySelector("#searchResult").classList.add('hide')
    }

    function showSearchResult() {
        document.querySelector("#searchResult").classList.remove('hide')
    }
</script>
<template>
    <section class="col-7 pe-3 border-end">
        <div>
            <input @input="searchMedicine" v-model="searchKeyword" id="searchBarMedicine" type="text" name="cariObat" class="form-control" placeholder="Cari Obat...">
        </div>
        <div class="mt-4 loading hide"></div>
        <!-- Medicines list -->
        <div id="searchResult">
            <!-- If medicine is not found -->
            <div class="mt-5 text-center" v-if="medicines.length == 0 && searchKeyword != ''">
                Tidak ada obat yang ditemukan
            </div>
            <!-- Medicine Cards -->
            <div v-else class="mt-4 d-flex flex-wrap gap-3 fs-6">
                <div v-for="medicine in medicines" :key="medicine.id" class="d-flex gap-3 shadow rounded-4 overflow-hidden" style="width: 19rem; height: 10.5rem">
                    <img :src="medicine.gambar_obat" class="card-img" alt="Gambar Obat">
                    <div class="d-flex flex-column justify-content-center">
                        <p class="mb-1 fw-bold">{{ medicine.nama_obat }}</p>
                        <p class="mb-2">Rp {{ medicine.harga }},-</p>
                        <p class="mb-3">Stok: {{ medicine.stok }}</p>
                        <form @submit.prevent="(event)=>emitAddSearchedItem(event, medicine)" class="d-flex gap-2">
                            <input name="orderItemQty" type="number" min="1" class="form-control w-form-sm text-center" placeholder="1">
                            <button class="btn btn-primary btn-primary-sm">Tambah</button>        
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</template>