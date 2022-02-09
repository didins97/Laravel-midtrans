<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class CustomerUpdate extends Component
{
    public $nama, $kd_customer, $alamat, $no_tlp, $customer_id;

    protected $listeners = ['getCustomer' => 'showCustomer'];

    public function render()
    {
        return view('livewire.customer-update');
    }

    public function showCustomer($customer)
    {
        $this->customer_id = $customer['id'];
        $this->nama = $customer['nama'];
        $this->kd_customer = $customer['kd_customer'];
        $this->alamat = $customer['alamat'];
        $this->no_tlp = $customer['no_tlp'];
    }

    public function update()
    {
        $validate = $this->validate([
            'nama' => 'required|min:2',
            'no_tlp' => 'required:min:12',
            'kd_customer' => 'required',
            'alamat' => 'min:5',
        ]);

        if ($this->customer_id) {
            $customer = Customer::find($this->customer_id);
            $customer->update($validate);

            $this->resetInput();

            $this->emit('customerUpdate', $customer);
        }
    }

    private function resetInput()
    {
        $this->nama = null;
        $this->no_tlp = null;
        $this->alamat = null;
    }
}
