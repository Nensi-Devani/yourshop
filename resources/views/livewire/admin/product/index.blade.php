<div>
    @section('title')
        Viewing Products
    @endsection
     {{-- available modal --}}
     @if($modal)
     <div wire:ignore.self class="modal fade show" id="deletemodal" tabindex="-1" role="dialog" style="display: inline-block;background:rgba(0, 0, 0, 0.8)">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Change Availablity of Product</h5>
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
                     <form wire:submit.prevent="destroyProduct">
                         <div class="modal-body">
                             <p class="text-center">Are you sure, You want to <strong>{{$availableTxt}}</strong> this Product ???</p>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal">No</button>
                             <button type="submit" id="deletebtn" class="btn {{$availableTxt == 'Available'?'btn-success':'btn-danger'}}  text-light">Yes</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 @endif
 {{-- end available modal --}}
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
        <div class="row">
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
                        <h3 class="mt-1">Products
                            <a wire:navigate href="{{url('admin/products/create-product')}}" class="btn btn-primary rounded mx-2 text-white float-end">Add Product</a>
                        </h3>
                    </div>
                    <div class="cared-body pb-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Sub-Category</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td class="">
                                                <img src="{{asset($item->getFirstMediaUrl())}}" class="img-fluid rounded" style="object-fit:cover;height:80px;width:100px">
                                            </td>
                                            <td>{{$item->category->name}}</td>
                                            <td>{{$item->subCategory->name}}</td>
                                            <td style="max-width: 240px;white-space: nowrap;
                                            overflow: hidden;
                                            text-overflow:ellipsis">{{$item->name}}</td>
                                            @php
                                                $totalQuantity = 0;
                                            @endphp
                                            @foreach($item->productSizes as $size)
                                                @php
                                                    $totalQuantity+= $size->quantity
                                                @endphp
                                            @endforeach
                                            <td>
                                                @if ($item->quantity)
                                                    {{$item->quantity}}
                                                @else
                                                    {{$totalQuantity}}
                                                @endif
                                            </td>
                                            <td> <i class="fa-solid fs-4 {{$item->status == '1' ? 'fa-eye' : 'fa-eye-slash'}}"></i></td>
                                            <td>
                                                <a wire:navigate href="{{url('admin/product/'.$item->id.'/edit')}}" class="btn mx-2 btn-sm btn-warning">
                                                    <small class="fa-solid fa-pen"></small>
                                                    <small>Edit</small>
                                                </a>
                                                @if ($item->available == 1)
                                                    <a wire:click="deleteProduct({{$item->id}},'Un-available')" class="text-light btn mx-2 btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deletemodal">
                                                        <small class="fa-solid fa-ban"></small>
                                                        <small>Un-available</small>
                                                    </a>
                                                @else
                                                    <a wire:click="deleteProduct({{$item->id}},'Available')" class="text-light btn mx-2 btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deletemodal">
                                                        <small class="fa-solid fa-check"></small>
                                                        <small>Available</small>
                                                    </a>

                                                @endif
                                                @if ($item->parent_id == null)
                                                    <a wire:navigate href="{{url('admin/product/'.$item->id.'/add-color')}}" class="btn btn-info btn-sm text-white " data-bs-toggle="modal" data-bs-target="#deletemodal">
                                                        <small class="fa-solid fa-palette menu-icon"></small>
                                                        <small>Add Color</small>
                                                    </a>
                                                @else
                                                    <a  class="btn btn-secondary btn-sm text-white disabled" data-bs-toggle="modal" data-bs-target="#deletemodal">
                                                        <small class="fa-solid fa-palette menu-icon"></small>
                                                        <small class="text-decoration-line-through">Add Color</small>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-danger">No Products Found !!!!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
