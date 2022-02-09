<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\Customer;
use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithPagination;

class TransaksiIndex extends Component
{

    use WithPagination;

    public $nm_barang, $hrg_barang, $customer;

    public function render()
    {
        return view('livewire.transaksi.transaksi-index', [
            'customers' => Customer::all(),
            'transaksi' => Transaksi::latest()->paginate(5)
        ]);
    }

    public function store()
    {
        // $kembali = $this->kembali;
        Transaksi::create([
            'number' => $this->generateUniqueCode(),
            'nm_barang' => $this->nm_barang,
            'hrg_barang' => $this->hrg_barang,
            'customer_id' => $this->customer,
            'payment_status' => '1'
        ]);
        $this->emit('transaksiStore');   
    
    }

    private function generateUniqueCode()
    {
        do {
            $number = random_int(100000, 999999);
        } while (Transaksi::where("number", "=", $number)->first());
  
        return $number;
    }
}
