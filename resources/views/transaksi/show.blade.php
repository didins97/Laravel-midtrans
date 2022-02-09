<x-app-layout>

    @section('css')

    <style>
        html {
            font-size: 14px;
        }

        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }

        .container {
            max-width: 960px;
        }

        .pricing-header {
            max-width: 700px;
        }

        .card-deck .card {
            min-width: 220px;
        }

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }
    </style>
        
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container pb-5 pt-5">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5>Data Order</h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-condensed">
                                        <tr>
                                            <td>ID</td>
                                            <td><b>#{{ $transaksi->number }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Total Harga</td>
                                            <td><b>Rp {{ number_format($transaksi->hrg_barang, 2, ',', '.') }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Status Pembayaran</td>
                                            <td><b>
                                                    @if ($transaksi->payment_status == 1)
                                                        Menunggu Pembayaran
                                                    @elseif ($transaksi->payment_status == 2)
                                                        Sudah Dibayar
                                                    @else
                                                        Kadaluarsa
                                                    @endif
                                                </b></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td><b>{{ $transaksi->created_at->format('d M Y H:i') }}</b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5>Pembayaran</h5>
                                </div>
                                <div class="card-body">
                                    @if ($transaksi->payment_status == 1)
                                        <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
                                    @else
                                        Pembayaran berhasil
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        });
    </script>

    @endpush
</x-app-layout>