<div>
  {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
  <form wire:submit.prevent="update">
      <div class="form-group mt-4">
        <label for="inputAddress">Kode Pelanggan</label>
        <input type="text" wire:model="kd_customer" readonly class="form-control" id="staticEmail" value="{{ $kd_customer }}">
      </div>
      <div class="form-group row">
        
        <div class="col">
          <input type="text" wire:model="nama" class="form-control 
          @error('nama')
            is-invalid
          @enderror" name="nama" id="inputPassword" placeholder="Nama">
          @error('nama') <span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        
        <div class="col mb-3">
          <input type="text" wire:model="no_tlp" class="form-control @error('no_tlp')
            is-invalid
          @enderror" name="no_tlp" id="inputPassword" placeholder="No Telepon">
          @error('no_tlp') <span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
      </div>

      <div class="form-group">
        <textarea name="alamat" wire:model="alamat" class="form-control @error('alamat')
                  is-invalid
              @enderror" placeholder="Alamat" id="" cols="85" rows="5"></textarea>
              @error('alamat')<span class="invalid-feedback">{{ $message }}</span>@enderror
      </div>
      <button type="submit" class="btn btn-primary btn-sm mt-2">Tambah</button>
      {{-- {{ $nama }} --}}
    </form>
</div>

