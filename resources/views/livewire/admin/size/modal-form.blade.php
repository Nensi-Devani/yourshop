{{-- add color form --}}
@if ($add)
<div wire:ignore.self class="modal show fade" style="display: inline-block;background:rgba(0, 0, 0, 0.8)" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Size</h5>
          <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div>
            <form wire:submit.prevent="addSize">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Category <span class="text-danger">*</span></label>
                        <select class="form-select mt-1" wire:model.live='category'>
                            <option value="">Select Category</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('category')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    @if ($subCategories)
                        <div class="mb-3">
                            <label for="">Sub-Category <span class="text-danger">*</span></label>
                            <select class="form-select mt-1" wire:model='subCategory'>
                                <option value="">Select Sub-Category</option>
                                @foreach ($subCategories as $subItem)
                                    <option value="{{$subItem->id}}">{{$subItem->name}}</option>
                                @endforeach
                            </select>
                            @error('subCategory')  <small class="text-danger">{{$message}}</small>  @enderror
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="">Size <span class="text-danger">*</span></label>
                        <input type="text" wire:model="size" class="form-control">
                        @error('size')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <div class="form-check form-switch">
                            <input wire:model="status" class="form-check-input form-control mx-auto" type="checkbox" checked>
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Size</h5>
          <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div>
            <form wire:submit.prevent="updateSize">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Category <span class="text-danger">*</span></label>
                        <select class="form-select mt-1" wire:model.live='category'>
                            <option value="">Select Category</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('category')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    @if ($subCategories)
                        <div class="mb-3">
                            <label for="">Sub-Category <span class="text-danger">*</span></label>
                            <select class="form-select mt-1" wire:model='subCategory'>
                                <option value="">Select Sub-Category</option>
                                @foreach ($subCategories as $subItem)
                                    <option value="{{$subItem->id}}">{{$subItem->name}}</option>
                                @endforeach
                            </select>
                            @error('subCategory')  <small class="text-danger">{{$message}}</small>  @enderror
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="">Size <span class="text-danger">*</span></label>
                        <input type="text" wire:model="size" class="form-control">
                        @error('size')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <div class="form-check form-switch">
                            <input wire:model="status" class="form-check-input form-control mx-auto" type="checkbox" {{$status=='1'?'checked':''}}>
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
            <form wire:submit.prevent="destroySize">
                <div class="modal-body">
                    <p class="text-center">Are you sure, You want to delete this Size ???</p>
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
