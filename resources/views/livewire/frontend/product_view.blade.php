<div>
    @section('title')
        {{$product->meta_title}}
    @endsection
    @section('meta_description')
        {{$product->meta_description}}
    @endsection
    @section('meta_keyword')
        {{$product->meta_keyword}}
    @endsection

    <div class="mt-4">
            <section class="py-1" data-scroll {{-- data-scroll --}}>
                <div class="container" data-scroll>
                    <div class="row gx-5" data-scroll>
                        <div class="col-lg-1" >
                            <div class="d-md-flex flex-column justify-content-center d-none">
                                {{-- small images for laptop--}}
                                @foreach ($product->getMedia() as $item)
                                    <div>
                                        <img width="60" height="80" class="small-image image-fluid border border-secondary shadow-sm rounded-2 mb-1 item-thumb cursor-pointer" src="{{asset($item->getUrl())}}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <aside class="col-lg-4 px-0">
                            <div class="rounded mb-3 d-flex position-relative" {{-- data-scroll data-scroll-repeat data-scroll-class="visible" --}}>
                                <div class="position-absolute m-2 bg-body rounded-circle p-2 d-flex justify-content-center mx-3" style="right: 0px">
                                    {{-- heart icon of wishlist --}}
                                    @if ($isProductAddedInWishlist == true)
                                        <i wire:click="WishList({{$product->id}})" class="fa-solid fa-heart cursor-pointer fs-4" style="color: #e61919;"></i>
                                    @else
                                        <i wire:click="WishList({{$product->id}})" class="add-to-wishlist fa-regular fa-heart cursor-pointer text-dark-blue fs-4 add-wishlist-icon"></i>
                                    @endif
                                </div>
                                {{-- big iamge --}}
                                <div class="col-lg-12 d-flex flex-column px-1">
                                    <img class="imgZoom big-image border product-big-image rounded w-100" src="{{asset($product->getFirstMediaUrl())}}" ref="{{asset($product->getFirstMediaUrl())}}" {{-- style="height:600px" --}}/>
                                    {{-- add to cart & buy now btns --}}
                                    <div class="col-md-12 mt-2 d-flex px-3 px-md-0">
                                        <button wire:click="addToCart" class="btn w-50 mx-2 mx-md-1 btn-primary shadow-0"> <i class="me-1 fa fa-shopping-cart text-light"></i> Add to cart </button>
                                        <a wire:navigate href="{{url('/buy-now/'.$product->slug.'/'.$index.'/'.$quantity)}}" class="btn w-50 mx-1 mx-md-1 btn-dark-blue text-light shadow-0"><i class="me-1 fa-solid fa-angles-right text-light"></i> Buy now </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-none d-flex justify-content-center">
                                {{-- small images for phone --}}
                                @foreach ($product->getMedia() as $item)
                                        <img width="60" height="80" class="small-image mx-1 image-fluid border border-secondary shadow-sm rounded-2 mb-1 item-thumb cursor-pointer" src="{{asset($item->getUrl())}}" />
                                @endforeach
                            </div>
                        </aside>
                        <main class="col-lg-6">
                            @php
                                $productQuantity = 0;
                                // for original price & delivery_charge & qty
                                if($product->selling_price	> 0)
                                {
                                    $productQuantity = $product->quantity;
                                    $orgPrice = $product->original_price;
                                    $delivaryCharge = $product->delivery_charge;
                                }
                                else{
                                    foreach ($product->productSizes as $size)
                                        $productQuantity = $product->productSizes[$index]->quantity;
                                    $orgPrice = $product->productSizes[$index]->original_price;
                                    $delivaryCharge = $product->productSizes[$index]->delivery_charge;
                                }
                            @endphp
                                <div class="float-end {{$productQuantity>0?'bg-success':'bg-danger'}} text-light px-2 rounded">
                                    <small>{{$productQuantity>0?'In Stock':'Out of Stock'}} </small>
                                </div>
                                <div class="ps-lg-3 mt-4" >
                                    <h4 class=" title text-dark" data-scroll data-scroll-repeat data-scroll-class="visible">
                                        {{$product->name}}
                                    </h4>
                                    <div class="d-flex flex-row my-0">
                                    {{-- <div class="text-warning mb-1 me-2">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="ms-1">
                                        4.5
                                        </span>
                                    </div> --}}
                            </div>
                            <div class="mb-3 mt-2 d-flex justify-content-between">
                                <div class="">
                                    {{-- for old price --}}
                                    @if ($product->original_price > 0 && $product->original_price != $product->selling_price)
                                        M.R.P : <span class="small text-danger"><s> &#8377 {{$product->original_price}}</s></span>
                                    @elseif ($product->productSizes->count() > 0)
                                        @if ($product->productSizes[$index]->original_price > 0 && $product->productSizes[$index]->original_price != $product->productSizes[$index]->price )
                                            M.R.P : <span class="small text-danger"><s> &#8377 {{$product->productSizes[$index]->original_price}}</s></span>
                                        @endif
                                    @endif
                                    {{-- for selling price --}}
                                    @if ($product->selling_price)
                                        <p class="h4">&#8377 {{$product->selling_price}}</p>
                                    @else
                                        <p class="h4">&#8377 {{$product->productSizes[$index]->price}}</p>
                                    @endif
                                </div>
                                <div class="text-primary" style="font-size: 15px">
                                    @if ($delivaryCharge > 0 || $delivaryCharge != null)
                                        <small class="">Delivery <span class="mt-1"><b>&#8377</b>{{$delivaryCharge}}</span></small>
                                    @else
                                        <small class="py-1 px-2 border border-primary rounded-pill">Free Delivery</small>
                                    @endif
                                </div>
                            </div>
                            {{-- color --}}
                            <div class="mb-3">
                                @if ($product->children->count() > 0)
                                    <span class="text-dark-blue">Color</span>
                                    <div class="my-1 d-flex ">
                                        @if ($product->parent_id != null)
                                            <a href="{{url('categories/'.$product->parent->category->name.'/'.$product->parent->slug)}}" target="_blank" class="text-decoration-none">
                                                <img src="{{$product->parent->getFirstMediaUrl()}}" width="60" height="80" class="child-image image-fluid mx-1 rounded cursor-pointer">
                                            </a>
                                        @endif
                                        <div class="p-1 border border-primary mx-1 rounded ">
                                            <img src="{{$product->getFirstMediaUrl()}}" width="60" height="80" class="child-image image-fluid rounded cursor-pointer">
                                        </div>
                                        @foreach ($product->children as $child)
                                            <div class="p-1 mx-1 rounded">
                                                @if ($child->id != $product->id)
                                                    <a href="{{url('categories/'.$child->category->name.'/'.$child->slug)}}" target="_blank" class="text-decoration-none">
                                                        <img src="{{$child->getFirstMediaUrl()}}" width="60" height="80" class="child-image image-fluid rounded cursor-pointer">
                                                    </a>
                                                @endif
                                            </div>
                                         @endforeach
                                    </div>
                                @endif
                                @if ($product->parent_id != null)
                                    @if ($product->parent->count() > 0)
                                        <span class="text-dark-blue">Color</span>
                                        <div class="my-1 d-flex">
                                            <div class="p-1 border border-primary mx-1 rounded ">
                                                <img src="{{$product->getFirstMediaUrl()}}" width="60" height="80" class="image-fluid rounded cursor-pointer">
                                            </div>
                                            <a href="{{url('categories/'.$product->parent->category->name.'/'.$product->parent->slug)}}" target="_blank">
                                                <div class="p-1 border mx-1 rounded ">
                                                    <img src="{{$product->parent->getFirstMediaUrl()}}" width="60" height="80" class="child-image image-fluid rounded cursor-pointer">
                                                </div>
                                            </a>
                                            @foreach ($product->parent->children as $pchild)
                                                <div class="p-1 mx-1 rounded">
                                                    @if ($pchild->id != $product->id)
                                                        <a href="{{url('categories/'.$pchild->category->name.'/'.$pchild->slug)}}" target="_blank" class="text-decoration-none">
                                                            <img src="{{$pchild->getFirstMediaUrl()}}" width="60" height="80" class="child-image image-fluid rounded cursor-pointer">
                                                        </a>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            </div>
                            {{-- sizes --}}
                            <div class="mb-3">
                                @if ($product->productSizes->count() > 0)
                                    <span class="text-dark-blue">Size </span>
                                    <div class="mt-1">
                                        @foreach ($product->productSizes as $key => $item)
                                            <button wire:click="updateIndex({{$key}})" class="rounded px-4 py-2 bg-white {{$key==$index?'size-selected border-primary border-2':'size-select border border-secondary'}}" {{$key==$index?'selected':''}}>{{$item->size->size}}</button>
                                            {{-- <button wire:click="colorSelected({{$item->color_id}})" class="color-button rounded-circle p-3 border-0" style="background:{{$item}}" {{$key==0?'selected':''}}></button> --}}
                                        @endforeach
                                    </div>
                                @else
                                    <small class="text-muted border border-secondary px-3 py-1 rounded-pill">Free Size</small>
                                @endif
                            </div>
                            {{-- quantity --}}
                            @if ($productQuantity > 0)
                                <label class="mb-2 d-block text-dark-blue">Quantity</label>
                                <div class="input-group mb-3" style="width: 170px;">
                                    <button wire:click.prevent="decQty" class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                                      <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="text" wire:model="quantity" class="form-control text-center border border-secondary" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly/>
                                    @if($product->selling_price > 0)
                                        <button wire:click.prevent="incQty({{$product->quantity}})" class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    @else
                                        <button wire:click.prevent="incQty({{$product->productSizes[$index]->quantity}})" class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    @endif
                                </div>
                            @endif
                                <hr />
                            {{-- discription --}}
                            <p>
                                <ul>
                                    @foreach ($descriptionItems as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </p>
                            <div class="row">
                                <span class="text-primary">Product Details </span> <br>
                                <div class="row mt-1">
                                    @if ($product->material)
                                        <dt class="col-3">Material</dt>
                                        <dd class="col-9">{{$product->material->material}}</dd>
                                    @endif
                                    <dt class="col-3">Brand</dt>
                                    <dd class="col-9">{{$product->brand->name}}</dd>

                                    @if ($product->color_id)
                                        <dt class="col-3">Color</dt>
                                        <dd class="col-9">{{$product->color->name}}</dd>
                                    @endif

                                    <dt class="col-3">Awailability</dt>
                                    <dd class="col-9">
                                        @if ($product->selling_price > 0)
                                        <span class="{{$product->quantity > 0 ?'text-success':'text-danger'}}">{{$product->quantity}} left</span>
                                        @else
                                        <span class="{{$product->productSizes[$index]->quantity > 0 ?'text-success':'text-danger'}}">{{$product->productSizes[$index]->quantity}} left</span>
                                        @endif
                                    </dd>

                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </section>

           <div class="container">
             {{-- relatedProducts --}}
             <div class="mt-4">
                <div class="row">
                    @if ($product->subCategory->products->count() > 1 )
                        <span class="mx-md-3 text-center mx-lg-3 mx-0 mb-4 heading fs-4" >
                            Related products
                        </span>
                    @endif
                    <div id="relatedProduct-slider" class="owl-carousel owl-carousel1">
                        @foreach ($product->subCategory->products as $item)
                            @if($item->id != $product->id)
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
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
           </div>
    </div>

    @section('script')
        <script>
            $(document).ready(function() {
                    $("#relatedProduct-slider").owlCarousel({
                        items : 4,
                        itemsDesktop:[1199,5],
                        itemsDesktopSmall:[980,2],
                        itemsMobile : [350,1],
                        pagination:false,
                        navigation:true,
                        navigationText:["",""],
                        autoPlay:true
                    });
                });
        //    to change image src
           document.addEventListener("DOMContentLoaded", function() {
                const bigImage = document.querySelector(".big-image");
                const smallImages = document.querySelectorAll(".small-image");
                const childImages = document.querySelectorAll(".child-image");
                const oldSrc = bigImage.getAttribute("src");

                smallImages.forEach(function(smallImage) {
                    smallImage.addEventListener("mouseover", function() {
                        const newSrc = this.getAttribute("src");
                        bigImage.setAttribute("src", newSrc);
                    });
                });

                childImages.forEach(function(childImg) {
                    childImg.addEventListener("mouseover", function() {
                        const newSrc = this.getAttribute("src");
                        bigImage.setAttribute("src", newSrc);
                    });
                    childImg.addEventListener("mouseout", function() {
                        bigImage.setAttribute("src", oldSrc);
                    });
                });
            });

            // for heart animation when add-to-wishlist
                // const heart = document.querySelector(".add-wishlist-icon");
                // const animationHeart = document.getElementById("my-heart-icon");
                // heart.addEventListener('click',()=>{
                //     animationHeart.classList.add('my-heart-icon');
                // });

        </script>
    @endsection
</div>
