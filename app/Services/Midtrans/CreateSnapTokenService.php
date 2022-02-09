<?php
 
namespace App\Services\Midtrans;
 
use Midtrans\Snap;
 
class CreateSnapTokenService extends Midtrans
{
    protected $transaksi;
 
    public function __construct($transaksi)
    {
        parent::__construct();
 
        $this->transaksi = $transaksi;
    }
 
    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->transaksi->number,
                'gross_amount' => $this->transaksi->hrg_barang,
            ],
            'item_details' => [
                [
                    'id' => $this->transaksi->id,
                    'price' => $this->transaksi->hrg_barang,
                    'quantity' => 1,
                    'name' => $this->transaksi->nm_barang,
                ]
            ],
            'customer_details' => [
                'first_name' => $this->transaksi->customer->nama,
                'email' => 'mulyosyahidin95@gmail.com',
                'phone' => $this->transaksi->customer->no_tlp,
            ]
        ];
 
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}