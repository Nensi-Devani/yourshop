<div class="row">
    @section('title')
        Viewing Home - Slider
    @endsection
    @include('livewire.admin.slider.modal-form')
    {{-- pre loader --}}
    <div wire:loading>
        <div class="row vw-100 p-0 m-0" style="height: 70vh">
            <div class="col-12 col-md-12 col-lg-12 m-0 p-0">
                <div class="d-flex justify-content-center align-items-center h-100 w-100" style="margin-left:-100px">
                    <div class="spinner-grow text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:loading.remove>
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show py-3 d-flex" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="20" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <h6 class="mt-1">{{session('message')}}</h6>
                    <button type="button" class="btn btn-sm mt-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Sliders
                        <a wire:click="showModal('add')" class="btn btn-primary rounded text-white float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Slider</a>
                    </h3>
                </div>
                <div class="card-body pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sliders as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td class="col-md-2">{{$item->title}}</td>
                                        <td class="col-md-5">{{$item->description}}</td>
                                        <td><image src="{{$item->getFirstMediaUrl()}}" class="image-fluid rounded" style="width:70px;height:50px"></image></td>
                                        <td> <i class="fa-solid fs-4 {{$item->status == '1' ? 'fa-eye' : 'fa-eye-slash'}}"></i></td>
                                        <td>
                                            <a wire:click="edit({{$item->id}})" class="btn mx-2 btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editBrandModal">
                                                <small class="fa-solid fa-pen"></small>
                                                <small>Edit</small>
                                            </a>
                                            <a wire:click="deleteSlider({{$item->id}})" class="text-light btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal">
                                                <small class="fa-solid fa-trash text-light"></small>
                                                <small>Delete</small>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-danger">No sliders Found !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="my-1">
                            {{ $sliders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
