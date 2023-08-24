<x-layout>
    <main>
        <div class="p-5 w-50 mx-auto rounded-4 shadow">
            <h1 class="fs-4 fw-bold text-center mb-5">{{ $nama_obat }}</h1>
            <table class="table table-borderless align-middle w-75 mx-auto">
                <tr>
                    <th>Stok</th>
                    <th>:</th>
                    <td>{{ $stok }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <th>:</th>
                    <td>{{ $hargaRupiah }}</td>
                </tr>
                <tr>
                    <th>Tanggal Expired</th>
                    <th>:</th>
                    <td>{{ $tanggal_expired->format('d-m-Y') }}</td>
                </tr>
                <tr class="align-top">
                    <th>Gambar</th>
                    <th>:</th>
                    <td class="d-flex align-items-start">
                        <img src="{{ $gambar_obat }}" class="card-img card-img-sm rounded-4" alt="{{ $gambar_obat }}">
                    </td>
                </tr>
            </table>
            <div class="w-75 mx-auto text-center mt-5">
                <form action="/medicines/{{$id_obat}}" method="POST" class="d-inline-block">
                @method('DELETE')
                @csrf
                    <button class="d-inline-flex align-items-center gap-2 btn btn-primary btn-primary-danger mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                        Hapus
                    </button>
                </form>
                <a href="/medicines/{{$id_obat}}/edit" class="d-inline-flex align-items-center gap-2 btn btn-primary btn-primary-info mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    Edit
                </a>
            </div>
        </div>
    </main>
</x-layout>