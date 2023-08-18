<x-layout>
    <main class="container">
        <div class="d-flex justify-content-between">
            <h3 class="mb-4">Buat Transaksi Baru</h3>
            <p class="login-as">Login sebagai: <span class="fw-bold">{{auth()->user()->username}}</span></p>
        </div>
        <div id="app">
            {{-- App.vue --}}
        </div>
    </main>
</x-layout>