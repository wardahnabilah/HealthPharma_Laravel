<x-layout>
    <main class="container">
        <h3 class="mb-5">Daftar Transaksi</h3>
        <table class="table table-bordered border-dark text-center">
            <thead>
                <th>ID Transaksi</th>
                <th class="w-25">Tanggal Transaksi</th>
                <th>Pegawai</th>
                <th>Total Harga</th>
                @if(auth()->user()->role == 'admin')
                    <th></th>
                @endif
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->tanggal_transaksi->format('d-m-Y')}}</td>
                    <td>{{$transaction->employee->username}}</td>
                    <td>{{$transaction->totalHargaRupiah()}}</td>
                    @can('delete', $transaction)
                        <td>
                            {{-- Delete button --}}
                            <form action="/transactions/{{$transaction->id}}" method="POST" class="d-inline-block">
                            @method('DELETE')
                            @csrf
                                <button type="submit" class="btn btn-outline-danger btn-primary-sm">
                                    Batalkan
                                </button>
                            </form>
                        </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-5">
            {{ $transactions->links() }}
        </div>
    </main>
</x-layout>