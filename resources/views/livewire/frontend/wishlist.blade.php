<div>
    @section('title')
        My Wishlist
    @endsection
        <section class="h-100 h-custom shadow shadow-lg mt-4">
            <div class="container py-2 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row">

                                    {{-- <div class="col-lg-3">
                                        <div class="card bg-dark-blue text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0 mx-auto">{{auth()->user()->name}}</h5>
                                            </div>

                                            <div class="d-flex align-items-center    bg-danger text-light mx-5">
                                                <i class="fa-solid fa-box"></i>
                                               <h6 class="mx-3">Profile</h6>
                                            </div>
                                            <hr class="my-4">

                                        </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-10 mx-auto"style="min-height: 75vh">
                                        <h5 class="mb-3">
                                            My Wishlist ({{$wishlistItems->count()}})
                                        </h5>
                                        <hr>
                                        @forelse ($wishlistItems as $item)
                                            @if($item->product->available)
                                            <a href="{{url('/categories/'.$item->product->category->slug.'/'.$item->product->slug)}}" target="_blank" class="text-decoration-none text-dark">
                                            @endif
                                                <div class="card mb-2" data-scroll>
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div>
                                                                    <img
                                                                    src="{{asset($item->product->getFirstMediaUrl())}}"
                                                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                                </div>
                                                                <div class="ms-3">
                                                                    <p> {{$item->product->name}}</p>
                                                                    <div class="d-flex">
                                                                        @if($item->product->available)
                                                                            <h5 class="mb-0">&#8377
                                                                                @if ($item->product->selling_price > 0)
                                                                                    {{$item->product->selling_price}}
                                                                                @else
                                                                                    {{$item->product->productSizes[0]->price}}
                                                                                @endif
                                                                            </h5>
                                                                            @if ($item->product->original_price > 0 && $item->product->original_price != $item->product->selling_price)
                                                                                <span class="small text-muted mx-2"><s> &#8377 {{$item->product->original_price}}</s></span>
                                                                            @endif
                                                                        @else
                                                                            <p class="text-danger">Product not available !!!</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row align-items-center">
                                                                <a style="color: #cecece;" wire:click="removeFromWishlist({{$item->id}})">
                                                                    <span wire:loading wire:target="removeFromWishlist({{$item->id}})">Removing...</span>
                                                                    <span wire:loading.remove wire:target="removeFromWishlist({{$item->id}})">
                                                                        <i class="fas fa-trash-alt cursor-pointer"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                    @empty
                                        <p class="text-primary text-center">No Product Saved to Wishlist !</p>
                                    @endforelse
                                    </div>

                                    {{-- <div class="vh-100 bg-dark"></div>
                                    <div class="vh-100 bg-info"></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
