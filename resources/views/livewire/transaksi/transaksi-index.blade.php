<div>
    <div class="container mt-3">

        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Tambah
            </button>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Status</th>
                    <th scope="col">Lihat</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($transaksi as $item)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $item->nm_barang}}</td>
                            <td>{{ $item->hrg_barang}}</td>
                            <td>
                                @if ($item->payment_status == 1)
                                    Menunggu Pembayaran
                                @elseif ($item->payment_status == 2)
                                    Sudah Dibayar
                                @else
                                    Kadaluarsa
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('transaksi.show', $item->id) }}" class="btn btn-success">
                                    Lihat
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
            {{ $transaksi->links() }}
        </div>
    </div>

    <!-- Modal -->
    @include('livewire.transaksi.modal-create')

    @push('script')
        <script type="text/javascript">
            window.livewire.on('transaksiStore', () => {
                $('#exampleModal').modal('hide');
            });
        </script>
    @endpush
</div>
