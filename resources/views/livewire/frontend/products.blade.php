<div>
    <div>
        <div class="">
              @section('title')
                {{$category->meta_title}}
              @endsection

              @section('meta_description')
                {{$category->meta_description}}
              @endsection
              @section('meta_keyword')
                {{$category->meta_keyword}}
              @endsection


             <section style="min-height: 85vh" class="mt-3">
                 <div class="container-fluid pt-2 px-3">
                     {{-- <h4 class="mb-5 heading" data-scroll-section>
                         <span>{{$category->name}}</span>
                     </h4> --}}
                    <section class="row">
                        <div class="col-md-2 p-0">
                            <div class="card d-block mt-1 border-0">
                                @if($category->subCategories)
                                    <div class="card border shadow mt-1">
                                        <div class="card-header bg-categories">
                                            <span class="fs-6 fw-bold mt-2 text-dark-blue">Categories</span>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($category->subCategories as $subCategory)
                                                <label class="d-block cursor-pointer hover-blue">
                                                    <input type="checkbox" wire:model.live="selected_category" value="{{$subCategory->id}}"> {{$subCategory->name}}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if($category->brands)
                                    <div class="card border shadow mt-1">
                                        <div class="card-header bg-categories">
                                            <span class="fs-6 fw-bold mt-2 text-dark-blue">Brands</span>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($category->brands as $brand)
                                                <label class="d-block cursor-pointer hover-blue">
                                                    <input type="checkbox" wire:model.live="selected_brands" value="{{$brand->id}}"> {{$brand->name}}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                {{-- <div class="card border shadow px-3 mt-1">
                                    <span class="fs-6 fw-bold mt-2 text-dark-blue">Availability</span>
                                    <div class="card-body">
                                        <label class="d-block cursor-pointer hover-blue">
                                            <input type="radio" wire:model.live="product_stock" value="true"> In Stock
                                        </label>
                                    </div>
                                </div> --}}
                                <div class="card border shadow mt-1">
                                    <div class="card-header bg-categories">
                                        <span class="fs-6 fw-bold mt-2 text-dark-blue">Price</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="range" data-mdb-range-init>
                                            <input type="range" wire:model.live="minPrice" min="100" max="5000" step="5" class="form-range">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span><strong>Min : </strong>100</span>
                                            <span><strong>Max : </strong>{{$minPrice}}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-10" data-scroll-section>
                            <div class="row" data-scroll-section>
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
                                            <a href="{{url('/categories/'.$category->slug.'/'.$item->slug)}}" class="text-decoration-none" target="_blank">
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
                                                            <h5 class="text-dark mb-0 ">&#8377
                                                                @if ($item->selling_price > 0)
                                                                    {{$item->selling_price}}
                                                                @else
                                                                    {{$item->productSizes[0]->price}}
                                                                @endif
                                                            </h5>
                                                        </div>

                                                    <div class="d-flex justify-content-between mb-2">
                                                        <small class="text-muted mb-0">
                                                                Available: <span class="fw-bold">{{$totalQuantity}}</span>
                                                        </small>
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

                                    <div class="col-md-12 col-12 py-5 my-5">
                                        <h4 class="mx-5 text-danger">No Products Awailable for {{$category->name}} !!!</h4>
                                    </div>

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
