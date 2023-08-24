<x-layout>
    <main>
        <div class="p-5 w-50 mx-auto rounded-4 shadow">
            <h1 class="fs-4 fw-bold text-center mb-5">Edit Obat</h1>
            <form action="/medicine/{{ $id_obat }}/edit" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-3 mx-auto">
            @method('PATCH')
            @csrf
                <table class="table table-borderless align-middle">
                    <tr>
                        <th class="col-3">Nama Obat</th>
                        <th>:</th>
                        <td>
                            <input type="text" name="namaObat" value="{{ $nama_obat }}" id="nama-obat" class=" form-control" placeholder="Nama Obat">
                            @error('namaObat')
                                <div class="error-message">{{$message}}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <th>:</th>
                        <td>
                            <input type="number" name="stokObat" value="{{ $stok }}" id="nama-obat" class=" form-control" placeholder="1">
                            @error('stokObat')
                                <div class="error-message">{{$message}}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <th>:</th>
                        <td>
                            <input oninput="changeFormat(event)" type="text" name="hargaObat" value="Rp {{ $harga }},-" id="nama-obat" class=" form-control" placeholder="Rp 10.000, -">
                            @error('hargaObat')
                                <div class="error-message">{{$message}}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Expired</th>
                        <th>:</th>
                        <td>
                            <input type="date" name="expiredObat" value="{{ $tanggal_expired->format('Y-m-d') }}" id="nama-obat" class=" form-control" placeholder="17 - 08 - 2023">
                            @error('expiredObat')
                                <div class="error-message">{{$message}}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <th>:</th>
                        <td class="d-flex gap-3 align-items-center">
                            <img src="{{ $gambar_obat }}" class="card-img rounded-4" alt="">
                            <input type="file" name="gambarObat" id="nama-obat" class="w-50" placeholder="17 - 08 - 2023">
                            @error('gambarObat')
                                <div class="error-message">{{$message}}</div>
                            @enderror
                        </td>
                    </tr>
                </table>
                <button class="btn btn-primary mt-4 text-uppercase fs-btn fw-semibold">Simpan</button>
            </form> 
        </div>
    </main>

    {{-- Script --}}
    <script>
        function changeFormat(event) {        
            event.target.value = moneyFormatWithRupiah(event.target.value)
    
            // Set the caret(cursor) position
            const caretPosition = event.target.value.length - 2
            event.target.setSelectionRange(caretPosition, caretPosition)
        }

        function moneyFormatWithRupiah(value) {
            let formattedValue = moneyFormat(value)
            
            return 'Rp' + formattedValue + ',-'
        }

        function moneyFormat(value) {
            // Accept only number
            let formattedValue = numberFormat(value)

            // Add . every three digits
            formattedValue = formattedValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.')

            return formattedValue
        }

        function numberFormat(value) {
            let onlyNumberValue = value.replace(/\D/g, '')
            
            return onlyNumberValue
        }
    </script>
</x-layout>