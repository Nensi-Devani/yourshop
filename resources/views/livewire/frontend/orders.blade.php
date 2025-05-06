<div>
    @section('title','My Orders')

    <section class="h-100 h-custom shadow shadow-lg mt-4">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4 ">
                            <div class="row">
                                {{-- user account --}}
                                {{-- <div class="col-lg-4">
                                    <div class="card bg-primary text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="mb-0">Card details</h5>
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                            class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                        </div>

                                        <p class="small mb-2">Card type</p>
                                        <a href="#!" type="submit" class="text-white"><i
                                            class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i
                                            class="fab fa-cc-visa fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i
                                            class="fab fa-cc-amex fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                                        <form class="mt-4">
                                        <div class="form-outline form-white mb-4">
                                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                            placeholder="Cardholder's Name" />
                                            <label class="form-label" for="typeName">Cardholder's Name</label>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                            placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                            <label class="form-label" for="typeText">Card Number</label>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                            <div class="form-outline form-white">
                                                <input type="text" id="typeExp" class="form-control form-control-lg"
                                                placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                                                <label class="form-label" for="typeExp">Expiration</label>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-outline form-white">
                                                <input type="password" id="typeText" class="form-control form-control-lg"
                                                placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                                <label class="form-label" for="typeText">Cvv</label>
                                            </div>
                                            </div>
                                        </div>

                                        </form>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between">
                                        <p class="mb-2">Subtotal</p>
                                        <p class="mb-2">$4798.00</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                        <p class="mb-2">Shipping</p>
                                        <p class="mb-2">$20.00</p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-2">Total(Incl. taxes)</p>
                                        <p class="mb-2">$4818.00</p>
                                        </div>

                                        <button type="button" class="btn btn-info btn-block btn-lg">
                                        <div class="d-flex justify-content-between">
                                            <span>$4818.00</span>
                                            <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                        </div>
                                        </button>

                                    </div>
                                    </div>
                                </div> --}}

                                <div class="col-lg-10 mx-auto" style="min-height: 75vh">
                                    <h5 class="mb-3">
                                        My Orders
                                    </h5>
                                    <hr>
                                    {{-- get all orders --}}
                                    @forelse ($orderItems as $item)
                                    {{-- get all products having the same order_id (that are ordered together) --}}
                                    @foreach ($item->orderItems as $ordItem)
                                    <a wire:navigate href="{{url('/orders/'.$item->id.'/order-information/'.$ordItem->id)}}" class="text-decoration-none text-dark">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img
                                                            src="{{asset($ordItem->product->getFirstMediaUrl())}}"
                                                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <p> {{$ordItem->product->name}}</p>
                                                            <div class="d-flex">
                                                                {{-- price --}}
                                                                <h5 class="mb-0">&#8377
                                                                    @if ($ordItem->product->selling_price > 0)
                                                                        {{$ordItem->product->selling_price}}
                                                                    @else
                                                                        @foreach ($ordItem->product->productSizes as $size)
                                                                            @if ($size->size_id == $ordItem->size_id)
                                                                                {{$size->price}}
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </h5>
                                                                @if($ordItem->size_id != null)
                                                                    <small class="text-secondary mx-3 mt-1">Size : {{$ordItem->size->size}}</small>
                                                                @else
                                                                <small class="text-secondary mx-3">Free Size</small>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                @empty
                                    <p class="text-primary text-center">No Order History Found !</p>
                                @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
