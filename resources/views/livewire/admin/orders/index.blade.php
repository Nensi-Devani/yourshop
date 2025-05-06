<div class="row">
    @section('title')
        Viewing Orders
    @endsection
    {{-- @include('livewire.admin.color.modal-form') --}}
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
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mt-1">Orders</h3>
                    <div class="col-md-3 mb-0 d-flex float-end">
                        <div class="col-md-12">
                            Filter by order date
                            <input type="date" wire:model.live="filter_date" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Ord Id</th>
                                    <th>Tracking No</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->tracking_no}}</td>
                                        <td>{{$item->fullname}}</td>
                                        <td>{{$item->payment_mode}}</td>
                                        <td>{{$item->created_at->format('d-m-y')}}</td>
                                        <td>
                                            <a wire:navigate href="{{url('admin/orders/'.$item->id)}}" class="btn btn-sm btn-info text-light" data-bs-toggle="modal" data-bs-target="#editBrandModal">
                                                <small class="fa-solid fa-eye "></small>
                                                <small>View</small>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-danger">No Orders Found !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="my-1">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
