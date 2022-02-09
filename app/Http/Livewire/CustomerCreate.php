<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class CustomerCreate extends Component
{
    public $nama, $no_tlp, $kd_customer, $alamat;

    protected $listeners = [
        'destroyCustomer' => 'generatekode'
    ];

    public function mount()
    {
        $this->generatekode();
    }

    public function generatekode()
    {
        $kd_max = Customer::max('kd_customer');
        if ($kd_max == null) {
            $this->kd_customer = 'CK001';
        } else {
            $urutan = substr($kd_max, 3, 3);
            $urutan++;
            $this->kd_customer = "CK".sprintf("%03s", $urutan);
        }
    }

    public function store()
    {
        $validate = $this->validate([
            'nama' => 'required|min:2',
            'no_tlp' => 'required:min:12',
            'kd_customer' => 'required',
            'alamat' => 'min:5',
        ]);

        $customer = Customer::create($validate);

        $this->resetInput();

        $this->emit('customerStored', $customer);
    }

    private function resetInput()
    {
        $this->nama = null;
        $this->no_tlp = null;
        $this->alamat = null;

        $this->generatekode();
    }

    public function render()
    {
        return view('livewire.customer-create');
    }
}
