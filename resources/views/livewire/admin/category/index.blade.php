<div>
    @section('title')
        Viewing Categories
    @endsection
    {{-- delete modal --}}
    @if($modal)
        <div wire:ignore.self class="modal fade show" id="deletemodal" tabindex="-1" role="dialog" style="display: inline-block;background:rgba(0, 0, 0, 0.8)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div wire:loading> {{-- pre loader --}}
                        <div class="d-flex justify-content-center m-5">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                          </div>
                    </div>
                    <div wire:loading.remove>
                        <form wire:submit.prevent="destroyCategory">
                            <div class="modal-body">
                                <p class="text-center">Are you sure, You want to delete this Category ???</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal">No</button>
                                <button type="submit" id="deletebtn" class="btn btn-danger text-light">Yes, Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- end delete modal --}}
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
                    <h3 class="mt-1">Categories
                        <a wire:navigate href="{{url('admin/category/create-category')}}" class="btn btn-primary rounded text-white float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            <img src="{{$item->getFirstMediaUrl('category_avatar')}}" class="rounded image-fluid" style="height:60px;width: 60px">
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td> <i class="fa-solid fs-4 {{$item->status == '1' ? 'fa-eye' : 'fa-eye-slash'}}"></i></td>
                                        <td>
                                            <a wire:navigate href="{{url('admin/category/'.$item->id.'/edit')}}" class="btn btn-sm  mx-2 btn-warning">
                                                <small class="fa-solid fa-pen"></small>
                                                <small>Edit</small>
                                            </a>
                                            <a wire:click="deleteCategory({{$item->id}})" class="btn btn-sm btn-danger text-white" data-bs-toggle="modal" data-bs-target="#deletemodal">
                                                <small class="fa-solid fa-trash text-light"></small>
                                                <small>Delete</small>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-danger">No Categories Found !!!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="my-1">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('closeModal', function () {
            $('#deletemodal').modal('hide');
        });
    </script>
@endpush
