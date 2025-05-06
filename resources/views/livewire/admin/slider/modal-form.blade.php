{{-- add color form --}}
@if ($add)
<div wire:ignore.self class="modal show fade" style="display: inline-block;background:rgba(0, 0, 0, 0.8)" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
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
            <form wire:submit.prevent="addSlider">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Slider Title</label>
                        <input type="text" wire:model="title" class="form-control" placeholder="XYZ">
                        @error('title')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Slider Description</label>
                        <textarea wire:model="description" cols="30" rows="3" class="form-control" placeholder="xyz......." style="resize: none"></textarea>
                        @error('description')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Slider Image</label>
                        <input type="file" wire:model="image" class="form-control" placeholder="xyz">
                        @error('image')  <small class="text-danger">{{$message}}</small>  @enderror
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
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
            <form wire:submit.prevent="updateSlider">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Slider Title</label>
                        <input type="text" wire:model="title" class="form-control" placeholder="XYZ">
                        @error('title')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Slider Description</label>
                        <textarea wire:model="description" cols="30" rows="3" class="form-control" placeholder="xyz......." style="resize: none"></textarea>
                        @error('description')  <small class="text-danger">{{$message}}</small>  @enderror
                    </div>
                    <div class="mb-1">
                        <label for="">Old Slider Image</label>
                        <img src="{{$image}}" class="img-fluid mx-auto rounded w-100" style="height: 200px;">
                    </div>
                    <div class="mb-3">
                        <label for="">Slider Image</label>
                        <input type="file" wire:model="newimage" class="form-control" placeholder="xyz">
                        @error('newimage')  <small class="text-danger">{{$message}}</small>  @enderror
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
          <h5 class="modal-title" id="exampleModalLabel">Delete Slider</h5>
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
            <form wire:submit.prevent="destroySlider">
                <div class="modal-body">
                    <p class="text-center">Are you sure, You want to delete this Slider ???</p>
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
