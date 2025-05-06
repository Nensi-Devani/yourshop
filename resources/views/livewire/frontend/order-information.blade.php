<div>
    @section('title')
        Order Information
    @endsection
    @if($modal)
        <div wire:ignore.self class="modal fade show" id="deletemodal" tabindex="-1" role="dialog" style="display: inline-block;background:rgba(0, 0, 0, 0.8)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$status=='returned'?'Return Product':'Cancel Order'}}</h5>
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
                        <form wire:submit.prevent="returnProduct">
                            <div class="modal-body">
                                <select wire:model="reason"  class="form-select">
                                    <option value="">Select the reason</option>
                                    @if ($status == 'returned')
                                        <option value="Product Defect or Damaged">Product Defect or Damaged</option>
                                        <option value="Wrong Item Received">Wrong Item Received</option>
                                        <option value="Size or Fit Issue">Size or Fit Issue</option>
                                        <option value="Unsatisfactory Quality">Unsatisfactory Quality</option>
                                        <option value="Late Delivery">Late Delivery</option>
                                        <option value="Changed Mind">Changed Mind</option>
                                        <option value="Other">Other</option>
                                    @else
                                        <option value="Order By Mistake">Order By Mistake</option>
                                        <option value="Changed Mind">Changed Mind</option>
                                        <option value="Found Cheaper Option">Found Cheaper Option</option>
                                        <option value="Ordered Wrong Item">Ordered Wrong Item</option>
                                        <option value="Product Quality Concerns">Product Quality Concerns</option>
                                        <option value="Other">Other</option>
                                    @endif
                                </select>
                                <small class="text-danger">
                                    @error('reason'){{$message}}@enderror
                                </small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal">Cancel</button>
                                <button type="submit" id="deletebtn" class="btn btn-danger text-light">Submit return request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="py-3 py-md-4 mt-md-1 mt-2 checkout">
        <div class="container">
            <div class="d-flex align-items-end justify-content-between mb-0">
                <h4 class="text-dark-blue">Order Information</h4>
                <a wire:navigate href="{{url('orders')}}" class="btn btn-primary btn-sm">Back</a>
            </div>
            <hr>
                <div class="row shadow rounded">
                    <div class="col-md-6 mb-4 ">
                        <div class=" bg-white p-3">
                            <h4 class="text-dark-blue">
                                Order Details
                            </h4>
                            <hr>
                            <h6 class="d-inline ">Order Id : </h6> <span>{{$order->id}}</span> <br>
                            <h6 class="d-inline">Trancking Id/No. : </h6> <span>{{$order->tracking_no}}</span> <br>
                            <h6 class="d-inline">Ordered Date : </h6> <span>{{$order->created_at}}</span> <br>
                            <h6 class="d-inline">Payment Mode : </h6> <span>{{$order->payment_mode}}</span> <br>
                            <h6 class="border text-success p-2 my-1">
                                Order Status : <span class="text-uppercase">{{$orderItem->order_status}}</span>
                            </h6>
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

                <div class="row shadow rounded mt-3 pt-3">
                    <div class="col-md-2">
                        <img src="{{$orderItem->product->getFirstMediaUrl()}}" class="image-fluid" style="width: 150px; height:180px">
                    </div>
                    <div class="col-md-6">
                        <h6 class="mt-2">{{$orderItem->product->name}}</h6>
                        <h5 class="mt-3">&#8377
                            @if ($orderItem->product->selling_price > 0)
                                {{$orderItem->product->selling_price}}
                            @else
                                @foreach ($orderItem->product->productSizes as $size)
                                    @if ($size->size_id == $orderItem->size_id)
                                        {{$size->price}}
                                    @endif
                                @endforeach
                            @endif
                        </h6>
                        {{-- size --}}
                        @if($orderItem->size_id != null)
                            <small class="text-secondary mt-1 fs-6">Size : {{$orderItem->size->size}}</small>
                        @else
                            <small class="text-secondary mx-2">Size : Free Size</small>
                        @endif
                        {{-- quantity --}}
                        <br>
                        <small class="mt-1 fs-6">Qty : {{$orderItem->quantity}}</small>
                        <div class="p-2 mt-2 bd-highlight">
                            {{-- text for the order status --}}
                            @if ($orderItem->order_status == 'delivered')
                                <p class="text-success">Delivered on {{$orderItem->updated_at->format('d / m / y') }}.</p>
                            @elseif ($orderItem->order_status == 'in progress' || $orderItem->order_status == 'pending')
                                <p class="text-secondary">Your order is {{$orderItem->order_status}}.   </p>
                            @elseif ($orderItem->order_status == 'shipped')
                                <p class="text-primary">Your order has been {{$orderItem->order_status}} !!!</p>
                            @elseif ($orderItem->order_status == 'cancelled')
                                <p class="text-primary">The product has been {{$orderItem->order_status}}.
                                    <br>
                                    @if ($orderItem->reason)
                                        <span class="text-danger">Reason :  {{$orderItem->reason}} </span>
                                    @endif
                                </p>
                            @elseif ($orderItem->order_status == 'returned')
                                <p class="text-primary">The product has been {{$orderItem->order_status}}.
                                    <br>
                                    @if ($orderItem->reason)
                                        <span class="text-danger">Reason :  {{$orderItem->reason}} </span>
                                    @endif
                                    @if ($orderItem->pickup)
                                        <span class="text-danger"> /Picked up on : </span> {{$orderItem->updated_at->format('d-m-Y')}}
                                    @endif
                                </p>
                            @endif
                            @if (session('message'))
                                <small class="text-success">{{session('message')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end bd-highlight justify-content-end">
                        <div class="d-flex align-items-end flex-column bd-highlight mb-3" style="height: 200px;">
                            <div class="mt-2">
                                {{-- buttons --}}
                                @if ($orderItem->order_status == 'delivered')
                                    <button class="btn btn-outline-danger btn-sm" wire:click='showModal("returned")'>Return Product</button>
                                    <a href="{{ url('downloadInvoice/' . $order->id . '/generate/' .$orderItem->id)}}" class="btn btn-primary btn-sm text-decoration-none">Download Invoice</a>
                                @elseif ($orderItem->order_status == 'in progress' || $orderItem->order_status == 'pending')
                                    <div class="p-2 bd-highlight">
                                        <button class="btn btn-danger btn-sm" wire:click='showModal("cancelled")'>Cancel Order</button>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-auto p-2 bd-highlight">
                                <h6 class="float-end bd-highlight">Total : &#8377
                                    @if ($orderItem->product->selling_price > 0)
                                        {{$orderItem->product->selling_price * $orderItem->quantity}}
                                    @else
                                        @foreach ($orderItem->product->productSizes as $size)
                                            @if ($size->size_id == $orderItem->size_id)
                                                {{$size->price * $orderItem->quantity}}
                                            @endif
                                        @endforeach
                                    @endif
                                </h6>
                            </div>
                          </div>
                    </div>
                </div>
        </div>
    </div>
</div>
