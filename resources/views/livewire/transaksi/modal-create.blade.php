<div class="modal fade" wire:ignore.self id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
        <form>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Pelanggan</label>
              <select class="form-control" wire:model="customer" id="exampleFormControlSelect1">
                <option>Pilih</option>
                @foreach ($customers as $cs)
                  <option value="{{ $cs->id }}">{{ $cs->nama }}</option>  
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Barang</label>
              <input type="text" wire:model="nm_barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Barang">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Harga Barang</label>
              <div class="input-group-prepend">
                <div class="input-group-text">Rp.</div>
                <input type="number" wire:model="hrg_barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Harga Barang">
              </div>
            </div>
            {{-- <div class="form-group">
              <label for="exampleInputEmail1">Kembali</label>
              <div class="input-group-prepend">
                <div class="input-group-text">Rp.</div>
                <input type="number" wire:model="kembali" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kembali">
              </div>
            </div> --}}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" wire:click="store()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> 