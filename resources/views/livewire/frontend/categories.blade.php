<div>
   <div class="">
         @section('title')
           YourShop | All Categories
        @endsection

        @section('content')
        <section class="">
            <div class="text-center container pt-2" {{-- data-scroll-section --}}>
                <h4 class="mb-5 mt-3 heading"  >
                    <span>Categories</span>
                </h4>

                <section class="row d-flex align-items-center justify-content-center" {{-- data-scroll --}}>
                    @foreach ($categories as $key => $item)
                        <div class="col-md-2 col-6 p-md-0 px-0">
                            <div class="mx-md-2 p-md-2 p-0 border my-2 cursor-pointer category-card category ">
                                <a wire:navigate href="{{url('/categories/'.$item->slug)}}" class="text-decoration-none">
                                    <div class="overflow-hidden" style="height:210px;border-radius:20px">
                                        <img src="{{asset($item->getFirstMediaUrl('category_image'))}}"  class="hover-zoom card-img-top h-100 w-100 image-fluid" alt="{{$item->name}}">
                                    </div>
                                    <span class="mt-2 text-dark-blue text-center">{{$item->name}}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
          </section>
        @endsection
   </div>
</div>
