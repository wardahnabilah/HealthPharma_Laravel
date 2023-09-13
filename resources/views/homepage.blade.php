<x-layout>
    <main class="container">
        <div class="d-flex justify-content-between">
            <h3 class="mb-4">Buat Transaksi Baru</h3>
            <p class="login-as">Login sebagai: <span class="fw-bold text-capitalize">{{auth()->user()->username}} <span class="text-lowercase">({{auth()->user()->role}})</span></span></p>
        </div>
        <div id="app">
            {{-- App.vue --}}
        </div>
    </main>
</x-layout>