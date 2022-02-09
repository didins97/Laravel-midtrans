<?php

namespace App\Http\Livewire;

use App\Models\Customer as ModelsCustomer;
use Livewire\Component;
use Livewire\WithPagination;

class Customer extends Component
{
    use WithPagination;

    public $statusUpdate = false;

    public $paginate = 5;

    public $search;

    protected $queryString = ['search'];

    protected $listeners = [
        'customerStored' => 'handleStored',
        'customerUpdate' => 'handleUpdate',
        'kodeCustomer' => 'handleCode',
    ];

    public function render()
    {
        // $this->customer = ModelsCustomer::get();
        return view('livewire.customer-index', [
            'customer' => ModelsCustomer::where('nama', 'like', '%'.$this->search.'%')->latest()->paginate($this->paginate)
        ]);
    }

    public function destroy($id)
    {
        $customer = ModelsCustomer::find($id);
        $customer->delete();
        session()->flash('message', $customer['nama']. " berhasil dihapus");

        $this->emit('destroyCustomer');
    }

    public function getCustomer($id)
    {
        $this->statusUpdate = true;
        $customer = ModelsCustomer::find($id);
        $this->emit('getCustomer', $customer);
    }

    public function handleStored($customer)
    {
        session()->flash('message', $customer['nama']. " berhasil ditambahkan");
    }

    public function handleUpdate($customer){
        session()->flash('message', $customer['nama']. " berhasil diupdate");
    }
}
