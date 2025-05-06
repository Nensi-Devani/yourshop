<div>
    @section('title')
        View Order
    @endsection
    <div class="p-3 py-md-4 mt-md-1 mt-2 bg-white">
        {{-- update order status modal --}}
        @if($modal)
        <div wire:ignore.self class="modal fade show" id="deletemodal" tabindex="-1" role="dialog" style="display: inline-block;background:rgba(0, 0, 0, 0.8)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Order Status</h5>
                        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div wire:loading> {{-- pre loader --}}
                        <div class="d-flex justify-content-center m-5">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                          </div>
                    </div>
                    <form wire:submit.prevent="updateOrdStatus" class="p-3">
                        <div wire:loading.remove>
                                    <select wire:model="ordStatus" id="" class="form-select">
                                        <option value="in progress">In Progress</option>
                                        <option value="pending">Pending</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>

                        </div>
                        <div class="modal-footer">
                            <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn bg-blue text-light">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @if ($showPickupModal)
        <div wire:ignore.self class="modal fade show" id="deletemodal" tabindex="-1" role="dialog" style="display: inline-block;background:rgba(0, 0, 0, 0.8)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Returned product picked-up ?</h5>
                        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div wire:loading> {{-- pre loader --}}
                        <div class="d-flex justify-content-center m-5">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                          </div>
                    </div>
                    <form wire:submit.prevent="pickedup" class="p-3">
                        <div wire:loading.remove>
                            Are you sure the product has been picked-up ???
                        </div>
                        <div class="modal-footer">
                            <button wire:click="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn bg-blue text-light">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        {{-- end modal --}}
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show py-3 d-flex" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="20" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <h6 class="mt-1">{{session('message')}}</h6>
                <button type="button" class="btn btn-sm mt-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container">
            <div class="d-flex align-items-end justify-content-between mb-0">
                <h4 class="text-dark-blue">Order Information</h4>
                <div class="">
                    <a  href="{{url('admin/orders/invoice/'.$order->id)}}" target="_blank" class="btn btn-info btn-sm text-white"><i class="fa-solid fa-eye" style="font-size: small"></i> View Invoice</a>
                    <a href="{{url('admin/orders/invoice/'.$order->id.'/generate')}}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-download" style="font-size: small"></i> Download Invoice</a>
                    <a wire:navigate href="{{url('admin/orders')}}" class="btn btn-primary btn-sm text-white">Back</a>
                </div>
            </div>
            <hr>
            {{-- details --}}
                <div class="row shadow rounded">
                    <div class="col-md-6 mb-4 ">
                        <div class=" bg-white p-3">
                            <h4 class="text-dark-blue">
                                Order Details
                            </h4>
                            <hr>
                            <h6>Order Id : <span class="fw-normal">{{$order->id}}</span></h6>
                            <h6>Trancking Id/No : <span class="fw-normal">{{$order->tracking_no}}</span></h6>
                            <h6>Ordered Date : <span class="fw-normal">{{$order->created_at}}</span></h6>
                            <h6>Payment Mode : <span class="fw-normal">{{$order->payment_mode}}</span></h6>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="bg-white p-3">
                            <h4 class="text-dark-blue">
                               Delivery Address
                            </h4>
                            <hr>
                            <h6>{{$order->fullname}}</h6>
                            <span class="d-block">{{$order->email}}</span>
                            <span class="d-block my-2">{{$order->address}}</span>
                            <h6>Pin code : {{$order->pincode}}</h6>
                            <h6>Phone number : {{$order->phone}}</h6>
                        </div>
                    </div>
                </div>

            {{-- products details --}}
                <div class="row shadow rounded mt-3 pt-3">
                    <h4 class="text-dark-blue"> Ordered Products </h4>
                    <div class="card-body pb-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Item Id</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Delivery Charge</th>
                                        <th>Quantity</th>
                                        <th>Order Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalAmount = 0;
                                        $i=0;
                                    @endphp
                                    @forelse ($orderItems as $key => $ordItem)
                                        @if ($ordItem->product->selling_price > 0)
                                            @php
                                                $price = $ordItem->product->selling_price;
                                                $delivary = $ordItem->product->delivery_charge * $ordItem->quantity;
                                            @endphp
                                        @else
                                            @foreach ($ordItem->product->productSizes as $size)
                                                @if ($size->size_id == $ordItem->size_id)
                                                    @php
                                                        $price = $size->price;
                                                        $delivary = $size->delivery_charge * $ordItem->quantity;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <tr>
                                            <td>{{$ordItem->id}}</td>
                                            <td><img src="{{$ordItem->product->getFirstMediaUrl()}}" class="img-fluid rounded" alt="Product image" style="width:80px;height:90px"></td>
                                            <td>{{$ordItem->product->name}}</td>
                                            <td>
                                                <span class="mb-0">&#8377
                                                    {{$price}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="mb-0">&#8377
                                                    {{$delivary}}
                                                </span>
                                            </td>
                                            <td>{{$ordItem->quantity}}</td>
                                            <td class="text-capitalize">
                                                @if ($ordItem->order_status == 'delivered' || $ordItem->order_status == 'returned' || $ordItem->order_status == 'cancelled')
                                                    <button class="btn btn-sm text-capitalize text-light mb-3 {{ $ordItem->order_status=='in progress' ? 'btn-primary' : ($ordItem->order_status=="pending" ? 'btn-secondary' : ($ordItem->order_status=='shipped' ? 'btn-warning' : ($ordItem->order_status=='delivered' ? 'btn-success' : 'btn-danger'))) }} ">
                                                        {{$ordItem->order_status}}
                                                    </button> <br>
                                                @else
                                                    <button wire:click="setOrdItmId({{$ordItem->id}})" class="btn btn-sm text-capitalize text-light mb-3 {{ $ordItem->order_status=='in progress' ? 'btn-primary' : ($ordItem->order_status=="pending" ? 'btn-secondary' : ($ordItem->order_status=='shipped' ? 'btn-warning' : ($ordItem->order_status=='delivered' ? 'btn-success' : 'btn-danger'))) }} ">
                                                        {{$ordItem->order_status}}
                                                    </button> <br>
                                                @endif
                                                    @if ($ordItem->order_status == 'returned')
                                                        @if ($ordItem->pickup)
                                                            <small class="text-danger">picked up on : {{$ordItem->updated_at->format('d-m-Y')}} </small>
                                                        @else
                                                            <small> Picked Up : <br>
                                                                <label wire:click="showPickupmodal({{$ordItem->id}})">

                                                                    <input type="checkbox" id="pick">
                                                                    Yes
                                                                </label>
                                                            </small>
                                                        @endif
                                                    @endif
                                            </td>
                                            <td>&#8377 {{$delivary + $ordItem->quantity * $price}}</td>
                                            @php
                                                $totalAmount += ($ordItem->quantity * $price) + $delivary;
                                                $i++;
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-danger">No Orders Found !!!</td>
                                        </tr>
                                    @endforelse

                                    {{-- for total --}}
                                    <tr>
                                        <td><h6>Total Amount : </h6></td>
                                        <td colspan="6"></td>
                                        <td><h6>&#8377 {{$totalAmount}}</h6></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
