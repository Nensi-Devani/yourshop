{{-- add color form --}}
@if ($add)
<div wire:ignore.self class="modal show fade" style="display: inline-block;background:rgba(0, 0, 0, 0.8)" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Color</h5>
          <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div>
            <form wire:submit.prevent="addColor">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Color Name <span class="text-danger">*</span></label>
                        <input type="text" wire:model="name" class="form-control" placeholder="XYZ">
                        @error('name')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Color Code <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="color" wire:model.live="code" class="border-0 form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
                            <input type="text" class="form-control" value="{{$code}}" disabled readonly>
                        </div>
                        @error('code')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <div class="form-check form-switch">
                            <input wire:model="status" class="form-check-input form-control mx-auto" type="checkbox" {{$status==1?'checked':''}}>
                        </div>
                        @error('status')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn bg-blue text-light">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endif

@if ($update)
{{-- edit color form --}}
<div wire:ignore.self class="modal fade show" style="display: inline-block;background:rgba(0, 0, 0, 0.8)" id="editBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Color</h5>
          <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div>
            <form wire:submit.prevent="updateColor">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Color Name <span class="text-danger">*</span></label>
                        <input type="text" wire:model.defer="name" class="form-control" placeholder="XYZ">
                        @error('name')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Color Code <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="color" wire:model.live="code" class="border-0 form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
                            <input type="text" class="form-control" value="{{$code}}" disabled readonly>
                        </div>
                        @error('code')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <div class="form-check form-switch">
                            <input wire:model="status" class="form-check-input form-control mx-auto" type="checkbox" {{$status==1?'checked':''}}>
                        </div>
                        @error('status')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn bg-blue text-light">Update</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endif


{{-- delete modal --}}
@if ($delete)
<div wire:ignore.self class="modal fade show" style="display: inline-block;background:rgba(0, 0, 0, 0.8)" id="editBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Color</h5>
          <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading> {{-- pre loader --}}
            <div class="d-flex justify-content-center m-5">
                <div class="spinner-grow text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
              </div>
        </div>
        <div wire:loading.remove>
            <form wire:submit.prevent="destroyColor">
                <div class="modal-body">
                    <p class="text-center">Are you sure, You want to delete this Color ???</p>
                </div>
                <div class="modal-footer">
                    <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger text-light">Yes, Delete</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endif
