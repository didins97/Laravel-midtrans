<div>
  <div class="container">
  @if ($statusUpdate)
    <livewire:customer-update>
  @else
    <livewire:customer-create>
  @endif

  <hr>

  
  @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
  @endif

  {{-- <div class="row">
    <div class="col">
      <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
      </select>
    </div>
    <div class="col-10">
        <input wire:model="search" class="form-control" type="search" placeholder="Search" aria-label="Search">
    </div>
  </div> --}}

  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand">
      <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
      </select>
    </a>
    <form class="form-inline">
      <input wire:model="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>

  

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Customer</th>
            <th scope="col">Nama</th>
            <th scope="col">No Telepon</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($customer as $item)
                <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $item->kd_customer}}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->no_tlp }}</td>
                <td>
                    <button wire:click="getCustomer({{ $item->id }})" type="button" class="btn btn-warning btn-sm">Edit</button>
                    <button wire:click="destroy({{ $item->id }})" type="button" class="btn btn-danger btn-sm">Hapus</button>
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{ $customer->links() }}
      </div>
      </div>
