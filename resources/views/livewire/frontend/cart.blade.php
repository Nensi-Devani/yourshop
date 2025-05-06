<div>
    @section('title')
        My Shopping Cart
    @endsection
    <div class="h-100 h-custom shadow shadow-lg mt-4">
        <div class="container py-2 h-100 mt-2">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-8" style="min-height: 77vh">
                                    <h5 class="mb-3">
                                        My Cart ({{$cartItems->count()}})
                                    </h5>
                                    <hr>
                                    @forelse ($cartItems as $item)
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img
                                                            src="{{asset($item->product->getFirstMediaUrl())}}"
                                                            class="img-fluid rounded-3" alt="Shopping item" style="width: 95px;">
                                                        </div>
                                                        {{-- details --}}
                                                        <div class="ms-3">
                                                            <a class="text-decoration-none text-dark-blue fs-6" href="@if($item->product->available){{url('/categories/'.$item->product->category->slug.'/'.$item->product->slug)}}@else#@endif" wire:navigate class="text-decoration-none text-dark">
                                                                <p class=""> {{$item->product->name}}</p>
                                                            </a>

                                                        {{-- @if ($item->available == 1) --}}
                                                        @if ($item->product->available)
                                                            @if ($item->size_id != null)
                                                            <span class="text-primary my-0">Size: <span class="text-secondary">{{$item->size->size }}</span></span>
                                                            @php
                                                                    $productSizes = json_decode($item->product->productSizes);
                                                                    $price = 0;$quantity = 0; $deliveryCharge = 0;
                                                                    foreach ($productSizes as $size) {
                                                                        if($size->size_id == $item->size_id)
                                                                        {
                                                                            // echo $item->product->productSizes;
                                                                            $price = $size->price;
                                                                            $originalPrice = $size->original_price;
                                                                            $quantity = $size->quantity;
                                                                            // for total items which are in stock
                                                                            if($quantity > 0)
                                                                                $totalPrice += ($size->price * $item->quantity);
                                                                            $deliveryCharge += ($size->delivery_charge * $item->quantity) ;
                                                                            $deliveryCharges += $deliveryCharge;
                                                                        }
                                                                    }
                                                            @endphp
                                                            <div class="d-flex">
                                                                <h5 class="mb-0">&#8377 {{$price}}</h5>
                                                                @if ($originalPrice > 0 && $originalPrice != $price)
                                                                    <span class="small text-muted mx-2"><s> &#8377 {{$originalPrice}}</s></span>
                                                                @endif
                                                            </div>
                                                            @else
                                                            {{-- for no-size product --}}
                                                            @php
                                                            $deliveryCharge = 0;
                                                                $quantity = $item->product->quantity;
                                                                if($quantity > 0)
                                                                    $totalPrice += $item->product->selling_price * $item->quantity;
                                                                $deliveryCharge += ($item->product->delivery_charge * $item->quantity) ;
                                                                $deliveryCharges += $deliveryCharge;
                                                            @endphp
                                                            <div class="d-flex">
                                                                <h5 class="mb-0">&#8377 {{$item->product->selling_price}}</h5>
                                                                @if ($item->product->original_price > 0 && $item->product->original_price != $item->product->selling_price)
                                                                    <span class="small text-muted mx-2"><s> &#8377 {{$item->product->original_price}}</s></span>
                                                                @endif
                                                            </div>
                                                            @endif
                                                            {{-- quantity --}}
                                                            @if ($quantity > 0)
                                                            <div class="input-group mb-2 mt-1" style="width: 140px;">
                                                                <button type="button" wire:click.prevent="decQty({{$item->id}})" class="btn btn-sm btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                                <input type="text" value="{{$item->quantity}}" class="form-control text-center border border-secondary form-control-sm px-3" placeholder="1" readonly/>
                                                                    <button type="button" wire:click.prevent="incQty({{$item->id}})" class="btn btn-sm btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                            <div class="text-muted" style="font-size: 15px">
                                                                @if ($deliveryCharge > 0 || $deliveryCharge != null)
                                                                    <small class="">Delivery <span class="mt-1"><b>&#8377</b>{{$deliveryCharge}}</span></small>
                                                                @else
                                                                    <small class="py-1 px-2">Free Delivery</small>
                                                                @endif
                                                            </div>
                                                            @else
                                                                <span class="text-danger">Out Of Stock</span>
                                                            @endif
                                                        @else
                                                            <p class="text-danger">Product not available !!!</p>
                                                        @endif

                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <a style="color: #cecece;" wire:click.prevent="removeFromCart({{$item->id}})">
                                                            <span wire:loading wire:target="removeFromCart({{$item->id}})">Removing...</span>
                                                            <span wire:loading.remove wire:target="removeFromCart({{$item->id}})">
                                                                <i class="fas fa-trash-alt cursor-pointer"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-primary text-center">No Product Added to Cart !</p>
                                    @endforelse
                                </div>

                                {{-- price details --}}
                                <div class="col-lg-4 d-block">
                                    <div class="card shadow text-dark-blue rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="mb-0">Price details</h5>
                                        </div>

                                        <p class="small mb-2">Awailable online payment</p>
                                        <a href="#!" type="submit" class="text-dark-blue"><i class="fa-brands fa-cc-stripe fa-2x"></i></a>
                                        {{-- <a href="#!" type="submit" class="text-dark-blue"><i class="fa-solid fa-money-bill fa-2x"></i></a> --}}

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between">
                                        <p class="mb-2">Price</p>
                                        <p class="mb-2">&#8377 {{$totalPrice}}</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                        <p class="mb-2">Delivery Charges</p>
                                        <p class="mb-2">&#8377 {{$deliveryCharges}}</p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-2">Total(Incl. taxes)</p>
                                        <p class="mb-2">&#8377 {{$totalPrice + $deliveryCharges}}</p>
                                        </div>

                                        <a wire:navigate href="{{url('/checkout')}}" class="btn btn-primary btn-block w-100">
                                            <div class="d-flex justify-content-center">
                                                <span>Order Now <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                            </div>
                                        </a>

                                    </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
