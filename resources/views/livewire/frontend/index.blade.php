<div>

    {{-- pre loader --}}
    {{-- <div wire:loading>
        <div class="row vw-100 p-0 m-0" style="height: 70vh">
            <div class="col-12 col-md-12 col-lg-12 m-0 p-0">
                <div class="d-flex justify-content-center align-items-center h-100 w-100" style="margin-left:-100px">
                    <div class="spinner-grow text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div {{-- wire:loading.remove --}}>
        @section('title')
            YourShop | Shop Anything
        @endsection
        @section('content')
                <section style="margin-top:21px" {{-- data-scroll-section --}}>
                    {{-- slider --}}
                    <div id="carouselExampleInterval" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($sliders as $key => $item)
                                <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="{{$key}}" class="{{$key==0?'active':''}}" aria-current="true" aria-label="Slide {{$key+1}}"></button>
                            @endforeach
                            </div>
                        <div class="carousel-inner {{-- hidden-slider --}}" {{-- data-scroll data-scroll-class="visible-slider" --}}>
                            @foreach ($sliders as $key => $item)
                                <div class="carousel-item {{$key==0?'active':''}}">
                                    <img src="{{$item->getFirstMediaUrl()}}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <div class="custom-carousel-content mt-0">
                                            <h1>
                                                <span>{{$item->title}}</span>
                                            </h1>
                                            <p>
                                                {{$item->description}}
                                            </p>
                                            <div>
                                                {{-- <a href="#" class="btn btn-slider">
                                                    Get Now
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    {{-- shop by categories --}}
                    <div class="container mt-3">
                        <div class="" >
                            <div class="row">
                                <span class="mx-md-3 text-center mx-lg-3 mx-0 mb-4 heading fs-4" >
                                    Shop By Category
                                </span>
                                <div id="news-slider" class="owl-carousel owl-slider1">
                                    @foreach ($categories as $item)
                                        <a wire:navigate href="{{url('/categories/'.$item->slug)}}" class="text-decoration-none">
                                            <div class="m-0 border px-3 py-2 d-flex flex-column justify-content-center" style="width: 180px;height:200px;border-radius:20px">
                                                <div class="bg-categories p-3 d-flex justify-content-center" style="border-radius:20px">
                                                    <img src="{{asset($item->getFirstMediaUrl('category_avatar'))}}" class="image-fluid mx-auto hover-zoom">
                                                </div>
                                                <span class="mt-2 text-dark-blue text-center">{{$item->name}}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- trending --}}
                        <div class="mt-4">
                            <div class="row">
                                <span class="mx-md-3 text-center mx-lg-3 mx-0 mb-4 heading fs-4" >
                                    Trending products
                                </span>
                                <div id="trending-slider" class="owl-carousel owl-carousel1">
                                    @foreach ($trending as $item)
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
                                <div class="col-12 p-1 col-sm-4 col-md-12 col-lg-12">
                                    <div class="card shadow shadow-sm {{-- product-card --}}">
                                        <div class="d-flex justify-content-between p-0">
                                            <div class="{{$totalQuantity>0?'in-stock-tag':'out-of-stock-tag'}} mt-0">
                                                <small class="text-light mx-2" style="font-size:13px">{{$totalQuantity>0?'In Stock':'Out Of Stock'}}</small>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center pt-2 shadow-1-strong rounded-circle bg-body" style="width: 30px; height: 30px;margin:0 12px 0 0">
                                                 {{-- @if(in_array($item->id, $wishlist))
                                                    <i wire:click="removeFromWishlist({{$item->id}})" wire:target="addToWishList({{$item->id}})" class="fa-solid fa-heart cursor-pointer fs-5" style="color: #e61919;"></i>
                                                @else
                                                    <i wire:click="addToWishList({{$item->id}})" wire:target="addToWishList({{$item->id}})" class="fa-regular fa-heart cursor-pointer text-dark-blue fs-5 add-wishlist-icon"></i>
                                                @endif --}}
                                            </div>
                                        </div>
                                        <a href="{{url('/categories/'.$item->category->slug.'/'.$item->slug)}}" class="text-decoration-none" target="_blank">
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
                                @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- static data --}}
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="card shadow shadow-sm p-2">
                                    <div class="d-flex justify-content-center align-items-center text-dark-blue">
                                        <div class="mx-3 p-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-file-earmark-lock" viewBox="0 0 16 16">
                                                <path d="M10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0M7 7v1h2V7a1 1 0 0 0-2 0M6 9.3v2.4c0 .042.02.107.105.175A.64.64 0 0 0 6.5 12h3a.64.64 0 0 0 .395-.125c.085-.068.105-.133.105-.175V9.3c0-.042-.02-.107-.105-.175A.64.64 0 0 0 9.5 9h-3a.64.64 0 0 0-.395.125C6.02 9.193 6 9.258 6 9.3"/>
                                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                            </svg>
                                        </div>
                                        <div class="p-3">
                                            <h5>Secure Payment</h5>
                                            <p>We offer secure shopping facalitites.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow shadow-sm p-2">
                                    <div class="d-flex justify-content-center align-items-center text-dark-blue">
                                        <div class="mx-3 p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                                              </svg>
                                        </div>
                                        <div class="p-3">
                                            <h5>100% Satisfaction</h5>
                                            <p>We provide 100% satisfaction on every shopping.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow shadow-sm p-2">
                                    <div class="d-flex justify-content-center align-items-center text-dark-blue">
                                        <div class="mx-3 p-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                              </svg>
                                        </div>
                                        <div class="p-3">
                                            <h5>Easy Return</h5>
                                            <p>We offer the esiest return to all users.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- new - arrivals --}}
                        <div class="mt-4">
                            <div class="row">
                                <span class="mx-md-3 text-center mx-lg-3 mx-0 mb-4 heading fs-4" >
                                    New-Arrivals
                                </span>
                                <div id="newArrival-slider" class="owl-carousel owl-carousel2">
                                    @foreach ($trending as $item)
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
                                <div class="col-12 p-1 col-sm-4 col-md-12 col-lg-12">
                                    <div class="card shadow shadow-sm {{-- product-card --}}">
                                        <div class="d-flex justify-content-between p-0">
                                            <div class="{{$totalQuantity>0?'in-stock-tag':'out-of-stock-tag'}} mt-0">
                                                <small class="text-light mx-2" style="font-size:13px">{{$totalQuantity>0?'In Stock':'Out Of Stock'}}</small>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center pt-2 shadow-1-strong rounded-circle bg-body" style="width: 30px; height: 30px;margin:0 12px 0 0">
                                                {{-- @if(in_array($item->id, $wishlist))
                                                    <i wire:click="removeFromWishlist({{$item->id}})" wire:target="addToWishList({{$item->id}})" class="fa-solid fa-heart cursor-pointer fs-5" style="color: #e61919;"></i>
                                                @else
                                                    <i wire:click="addToWishList({{$item->id}})" wire:target="addToWishList({{$item->id}})" class="fa-regular fa-heart cursor-pointer text-dark-blue fs-5 add-wishlist-icon"></i>
                                                @endif --}}
                                            </div>
                                        </div>
                                        <a href="{{url('/categories/'.$item->category->slug.'/'.$item->slug)}}" class="text-decoration-none" target="_blank">
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
                                @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- featured --}}
                        <div class="mt-4">
                            <div class="row">
                                <span class="mx-md-3 text-center mx-lg-3 mx-0 mb-4 heading fs-4" >
                                    Featured Products
                                </span>
                                <div id="featured-slider" class="owl-carousel owl-carousel2">
                                    @foreach ($featured as $item)
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
                                <div class="col-12 p-1 col-sm-4 col-md-12 col-lg-12">
                                    <div class="card shadow shadow-sm {{-- product-card --}}">
                                        <div class="d-flex justify-content-between p-0">
                                            <div class="{{$totalQuantity>0?'in-stock-tag':'out-of-stock-tag'}} mt-0">
                                                <small class="text-light mx-2" style="font-size:13px">{{$totalQuantity>0?'In Stock':'Out Of Stock'}}</small>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center pt-2 shadow-1-strong rounded-circle bg-body" style="width: 30px; height: 30px;margin:0 12px 0 0">
                                                {{-- @if(in_array($item->id, $wishlist))
                                                    <i wire:click="removeFromWishlist({{$item->id}})" wire:target="addToWishList({{$item->id}})" class="fa-solid fa-heart cursor-pointer fs-5" style="color: #e61919;"></i>
                                                @else
                                                    <i wire:click="addToWishList({{$item->id}})" wire:target="addToWishList({{$item->id}})" class="fa-regular fa-heart cursor-pointer text-dark-blue fs-5 add-wishlist-icon"></i>
                                                @endif --}}
                                            </div>
                                        </div>
                                        <a href="{{url('/categories/'.$item->category->slug.'/'.$item->slug)}}" class="text-decoration-none" target="_blank">
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
                                @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- <div class="vh-100 mt-5 mb-5" data-scroll>
                            <div class="row">
                                <span class="mx-md-3 text-center mx-lg-3 mx-0 mb-3 heading fs-4">
                                    Shop By Category
                                </span>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4 my-1 py-1 px-0">
                                    <img src="http://127.0.0.1:8000/storage/94/decor2.jpg" class="w-100 h-100">
                                </div>
                                <div class="col-md-6 p-1">
                                    <div class="row">
                                        <div class="col-md-6 my-1">
                                            <img src="http://127.0.0.1:8000/storage/94/decor2.jpg" class="w-100 h-100">
                                        </div>
                                        <div class="col-md-6 my-1">
                                            <img src="http://127.0.0.1:8000/storage/94/decor2.jpg" class="w-100 h-100">
                                        </div>
                                        <div class="col-md-6 my-1">
                                            <img src="http://127.0.0.1:8000/storage/94/decor2.jpg" class="w-100 h-100">
                                        </div>
                                        <div class="col-md-6 my-1">
                                            <img src="http://127.0.0.1:8000/storage/94/decor2.jpg" class="w-100 h-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </section>
        @endsection

        @section('script')
            <script>
            // for caegories slider
                $(document).ready(function() {
                    $("#news-slider").owlCarousel({
                        items : 7,
                        itemsDesktop:[1199,5],
                        itemsDesktopSmall:[980,2],
                        itemsMobile : [350,1],
                        pagination:false,
                        navigation:true,
                        navigationText:["",""],
                        autoPlay:true
                    });
                });
                $(document).ready(function() {
                    $("#trending-slider").owlCarousel({
                        items : 4,
                        itemsDesktop:[1199,5],
                        itemsDesktopSmall:[980,2],
                        itemsMobile : [700,1],
                        pagination:false,
                        navigation:true,
                        navigationText:["",""],
                        autoPlay:true
                    });
                });
                $(document).ready(function() {
                    $("#newArrival-slider").owlCarousel({
                        items : 4,
                        itemsDesktop:[1199,5],
                        itemsDesktopSmall:[980,2],
                        itemsMobile : [700,1],
                        pagination:false,
                        navigation:true,
                        navigationText:["",""],
                        autoPlay:true
                    });
                });
                $(document).ready(function() {
                    $("#featured-slider").owlCarousel({
                        items : 4,
                        itemsDesktop:[1199,5],
                        itemsDesktopSmall:[980,2],
                        itemsMobile : [700,1],
                        pagination:false,
                        navigation:true,
                        navigationText:["",""],
                        autoPlay:true
                    });
                });
            </script>
        @endsection
    </div>
</div>
