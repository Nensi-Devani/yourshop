<div>
    <div>
        <div class="container">
              @section('title','Jewellery')


             <section style="min-height: 85vh" class="mt-3">
                 <div class="container-fluid pt-2 px-3">
                    <section class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <span class="mx-md-3 text-center mx-lg-3 mx-0 mb-4 heading fs-4" >
                                   Jewellery
                                </span>
                                @forelse ($products as $item)
                                    @php
                                    $totalQuantity = 0;
                                        // for original price & delivery_charge & qty
                                        if($item->selling_price	> 0)
                                        {
                                            $totalQuantity = $item->quantity;
                                            $orgPrice = $item->original_price;
                                            $delivaryCharge = $item->delivery_charge;
                                        }
                                        else{
                                            foreach ($item->productSizes as $size)
                                                $totalQuantity+= $size->quantity;
                                            $orgPrice = $item->productSizes[0]->original_price;
                                            $delivaryCharge = $item->productSizes[0]->delivery_charge;
                                        }
                                    @endphp
                                    @foreach($item->productSizes as $size)
                                        @php
                                            $totalQuantity+= $size->quantity
                                        @endphp
                                     @endforeach
                                <div class="col-6 p-1 col-sm-4 col-md-4 col-lg-3 mb-2 mb-lg-0">
                                        <div class="card shadow shadow-sm {{-- product-card --}}">
                                            <div class="d-flex justify-content-between p-0">
                                                <div class="{{$totalQuantity>0?'in-stock-tag':'out-of-stock-tag'}} mt-0">
                                                    <small class="text-light mx-2 px-2" style="font-size:13px">{{$totalQuantity>0?'In Stock':'Out Of Stock'}}</small>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center pt-2 shadow-1-strong rounded-circle bg-body" style="width: 30px; height: 30px;margin:0 12px 0 0">
                                                    {{-- @if(in_array($item->id, $wishlist))
                                                        <i wire:click="removeFromWishlist({{$item->id}})" wire:target="addToWishList({{$item->id}})" class="fa-solid fa-heart cursor-pointer fs-5" style="color: #e61919;"></i>
                                                    @else
                                                        <i wire:click="addToWishList({{$item->id}})" wire:target="addToWishList({{$item->id}})" class="fa-regular fa-heart cursor-pointer text-dark-blue fs-5 add-wishlist-icon"></i>
                                                    @endif --}}
                                                </div>
                                            </div>
                                            <a href="{{url('/categories/'.$item->slug.'/'.$item->slug)}}" class="text-decoration-none" target="_blank">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <img src="{{asset($item->getFirstMediaUrl())}}" class="img-fluid product-image" alt="{{$item->name}}" />
                                                </div>

                                                    <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <p class="small"><span class="text-muted" style="text-decoration: underline">{{$item->brand->name}}</span></p>
                                                    <p class="small text-danger text-decoration-line-through">
                                                        @if ($orgPrice > 0)
                                                            <small> &#8377 {{$orgPrice}} </small>
                                                        @endif
                                                    </p>
                                                </div>

                                                <div class="d-flex justify-content-between mb-3">
                                                    <p class="mb-0 text-dark product-title">{{$item->name}}</p>
                                                    <h5 class="text-dark mb-0">&#8377
                                                        @if ($item->selling_price > 0)
                                                            {{$item->selling_price}}
                                                        @else
                                                            {{$item->productSizes[0]->price}}
                                                        @endif
                                                    </h5>
                                                 </div>

                                                    <div class="d-flex justify-content-between mb-2">
                                                        <small class="text-muted mb-0">Available: <span class="fw-bold">{{$totalQuantity}}</span></small>
                                                        {{-- <div class="ms-auto text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div> --}}
                                                    </div>
                                                    <div class="text-primary" style="font-size: 15px">
                                                        @if ($delivaryCharge > 0 || $delivaryCharge != null)
                                                            <small class="">Delivery <span class="mt-1"><b>&#8377</b>{{$delivaryCharge}}</span></small>
                                                        @else
                                                            <small class="py-1 px-2 border border-primary rounded-pill">Free Delivery</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                </div>
                                @empty
                                    <h4 class="text-danger my-3">No products found !</h4>
                                @endforelse
                                <div class="d-flex justify-content-end">
                                    <p>{{$products->links()}}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                 </div>
               </section>

        </div>
     </div>

</div>
