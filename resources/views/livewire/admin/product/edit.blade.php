<div>
    @section('title')
        Add Product
    @endsection

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show py-3 d-flex" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="20" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <h6 class="mt-1">{{session('message')}}</h6>
            <button type="button" class="btn btn-sm mt-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- @if ($errors->any())
            @foreach ($errors->all() as $item)
                    {{$item}}
            @endforeach
    @endif --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Edit Product
                        <a href="{{url('admin/products')}}" class="btn btn-primary rounded text-white float-end">Back</a>
                    </h3>
                </div>

                <div class="card-body">
                    <form wire:submit.prevent="updateProduct" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{$tab=='home'?'active':''}}" wire:click.prevent="tabActiveClass('home')" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-plane" type="button" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{$tab=='seo'?'active':''}}" wire:click.prevent="tabActiveClass('seo')" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo-tab-plane" type="button" aria-selected="false">SEO Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{$tab=='details'?'active':''}}" wire:click.prevent="tabActiveClass('details')" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-plane" type="button" aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{$tab=='images'?'active':''}}" wire:click.prevent="tabActiveClass('images')" id="images-tab" data-bs-toggle="tab" data-bs-target="#images-tab-plane" type="button" aria-selected="false">Product Images</button>
                            </li>

                        </ul>
                        <div class="tab-content border border-1 px-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-plane" role="tabpanel" wire:ignore.self>
                                <div class="row">
                                    <div class="{{$subCategories==null?'col-md-12':'col-md-6'}}">
                                        <div class="mb-3 mt-3">
                                            <label for="">Select Category <span class="text-danger">*</span></label>
                                            <select wire:model.live="category" class="form-select mt-1">
                                                <option value="{{old('category')}}">--- Select Category ---</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{$item->id}}" {{old('category') == $item->id ?'selected':''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">@error('category'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                    @if ($subCategories!=null)
                                        <div class="col-md-6">
                                            <div class="mb-3 mt-3">
                                                <label for="">Select Sub-Category <span class="text-danger">*</span></label>
                                                <select wire:model.live="subcategory" class="form-select mt-1">
                                                    <option value="{{old('subcategory')}}">--- Select Sub-Category ---</option>
                                                    @foreach($subCategories as $item)
                                                        <option value="{{$item->id}}" {{old('subcategory') == $item->id ?'selected':''}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger">@error('subcategory'){{$message}}@enderror</small>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" wire:model="name" value="{{old('name')}}" class="form-control mt-1" placeholder="Xyz">
                                    <small class="text-danger">@error('name'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Slug <span class="text-danger">*</span></label>
                                    <input type="text" wire:model.live="slug" value="{{old('slug')}}" class="form-control mt-1" placeholder="xyz">
                                    <small class="text-danger">@error('slug'){{$message}}@enderror</small>
                                </div>
                                <div class="row">
                                        <div class="{{$materials==null?'col-md-12':'col-md-6'}}">
                                            @if ($brands)
                                                <div class="mb-3">
                                                    <label for="">Select Brand <span class="text-danger">*</span></label>
                                                    <select wire:model="brand" class="form-select mt-1">
                                                        <option value="{{old('brand')}}">--- Select Brand ---</option>
                                                        @foreach ($brands as $item)
                                                            <option value="{{$item->id}}" {{old('brand') == $item->id ?'selected':''}}>{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <small class="text-danger">@error('brand'){{$message}}@enderror</small>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            @if ($materials)
                                                <div class="mb-3">
                                                    <label for="">Select Material</label>
                                                    <select wire:model="material" class="form-select mt-1">
                                                        <option value="{{old('material')}}">--- Select Material ---</option>
                                                        @foreach ($materials as $item)
                                                            <option value="{{$item->id}}" {{old('material') == $item->id ?'selected':''}}>{{$item->material}}</option>
                                                        @endforeach
                                                    </select>
                                                    <small class="text-danger">@error('material'){{$message}}@enderror</small>
                                                </div>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Small Description <span class="text-danger">*</span></label>
                                            <textarea wire:model="small_description" placeholder="Xyz small description" class="form-control" cols="30" rows="3" style="resize: none">{{old('small_description')}}</textarea>
                                            <small class="text-danger">@error('small_description'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Description <span class="text-danger">*</span></label>
                                            <textarea wire:model="description" placeholder="Xyz description" class="form-control" cols="30" rows="3" style="resize: none">{{old('description')}}</textarea>
                                            <small class="text-danger">@error('description'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="seo-tab-plane" role="tabpanel" wire:ignore.self>
                                <div class="my-3">
                                    <label for="">Meta Title <span class="text-danger">*</span></label>
                                    <input type="text" wire:model="meta_title" value="{{old('meta_title')}}" class="form-control mt-1" placeholder="xyz">
                                    <small class="text-danger">@error('meta_title'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description <span class="text-danger">*</span></label>
                                    <input type="text" wire:model="meta_description" value="{{old('meta_description')}}" class="form-control mt-1" placeholder="xyz description">
                                    <small class="text-danger">@error('meta_description'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword <span class="text-danger">*</span></label>
                                    <input type="text" wire:model="meta_keyword" value="{{old('meta_keyword')}}" class="form-control mt-1" placeholder="xyz">
                                    <small class="text-danger">@error('meta_keyword'){{$message}}@enderror</small>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="details-tab-plane" role="tabpanel" wire:ignore.self>
                                <div class="mt-0 d-flex flex-md-row flex-column justify-content-between">
                                    <div class="col-md-7 col-12 mt-2">
                                        <div class="mx-0 mx-md-2 d-flex">
                                            <input type="radio" value="no-size" wire:model.live="showSize" class="btn-check" id="single-product" autocomplete="off">
                                            <label class="btn btn-outline-primary my-primary-select-btn px-md-4 px-2" for="single-product">No Size Product</label><br>

                                            <input type="radio" value="multi-size" wire:model.live="showSize" class="btn-check" id="multiple-size-product" autocomplete="off">
                                            <label class="btn btn-outline-primary my-primary-select-btn mx-md-2 mx-1 px-md-4 px-2" for="multiple-size-product">Multiple Size Product</label><br>

                                            {{-- checkbox for color  --}}
                                            <input type="checkbox" wire:model.live="showColor" class="btn-check px-md-4 px-2" id="select-color" autocomplete="off">
                                            <label class="btn btn-outline-info " for="select-color">Select Color</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12 p-0 m-0">
                                        <div class="m-0 p-0 d-flex flex-md-row flex-column">
                                            <div class="d-flex col-md-8 col-12">
                                                <div class="col-6 m-0 p-0 d-flex  align-items-center justify-content-center">
                                                    <label for="trending">Trending :</label>
                                                    <div class="form-check form-switch">
                                                        <input wire:model="trending" id="trending" class="form-check-input form-control mx-md-3 mx-1" type="checkbox" {{$trending==1?'checked':''}}>
                                                    </div>
                                                </div>
                                                @error('trending')  <small class="text-danger">{{$message}}</small>  @enderror

                                                <div class="col-6 m-0 p-0 d-flex  align-items-center justify-content-center">
                                                    <label for="featured">Featured :</label>
                                                    <div class="form-check form-switch">
                                                        <input wire:model="featured" id="featured" class="form-check-input form-control mx-md-3 mx-1" type="checkbox" {{$trending==1?'checked':''}}>
                                                    </div>
                                                </div>
                                                @error('featured')  <small class="text-danger">{{$message}}</small>  @enderror
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="col-12 m-0 p-0 d-flex  align-items-center justify-content-center">
                                                    <label for="status">Status :</label>
                                                    <div class="form-check form-switch">
                                                        <input wire:model="status" id="status" class="form-check-input form-control mx-3" type="checkbox" {{$status==1?'checked':''}}>
                                                    </div>
                                                </div>
                                                @error('status')  <small class="text-danger">{{$message}}</small>  @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($showColor)
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Select Color</label>
                                            <div class="">
                                                @forelse ($color_list as $item)
                                                        <label style="background-color: {{ $item->code }}; cursor: pointer;" class="color-option-btn {{$color==$item->id?'color-select':''}} p-3 mx-1 rounded-circle">
                                                            <input type="radio" wire:model="color" value="{{ $item->id }}" style="display: none;">
                                                        </label>
                                                @empty
                                                    <small class="text-danger">No Colors Found !!!</small>
                                                @endforelse
                                            </div>
                                            <small class="text-danger">@error('color'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                @endif
                                <div class="row mt-2">
                                    @if ($showSize == "no-size")
                                        {{-- for no size product --}}
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">Original Price</label>
                                                <input type="number" min="1" wire:model="original_price" value="{{old('original_price')}}" class="form-control mt-1">
                                                <small class="text-danger">@error('original_price'){{$message}}@enderror</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">Selling Price </label>
                                                <input type="number" min="1" wire:model="selling_price" value="{{old('selling_price')}}" class="form-control mt-1">
                                                <small class="text-danger">@error('selling_price'){{$message}}@enderror</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">Quantity <span class="text-danger">*</span></label>
                                                <input type="number" min="1" wire:model="quantity" value="{{old('quantity')}}" class="form-control mt-1">
                                                <small class="text-danger">@error('quantity'){{$message}}@enderror</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">Delivary Charge</label>
                                                <input type="number" min="1" wire:model="delivary_charge" value="{{old('quantity')}}" class="form-control mt-1">
                                                <small class="text-danger">@error('delivaryCharge'){{$message}}@enderror</small>
                                            </div>
                                        </div>
                                    @else
                                        @if ($sizesAwailable)
                                            <div class="row d-flex justify-content-center">
                                                @foreach ($sizesAwailable as $item)
                                                        <div class="col-md-3 m-1">
                                                            <div class="card rounded shadow-sm p-3" style="width: 18rem;">
                                                                <div class="">
                                                                    <div class="mx-auto">
                                                                        <input type="checkbox" wire:model.live="sizes.{{$item->id}}" class="btn-check px-md-4 px-2" id="{{$item->id}}" autocomplete="off">
                                                                        <label class="btn btn-outline-success" for="{{$item->id}}">{{$item->size}}</label><br>
                                                                    </div>
                                                                    <div class="d-flex mb-2 align-items-center justify-content-between">
                                                                        <label for="">Qty <span class="text-danger">*</span></label>
                                                                        <input type="number" min="0" wire:model="sizeQty.{{$item->id}}" class="form-control form-control-sm mt-1 w-75">
                                                                    </div>
                                                                    <div class="d-flex mb-2 align-items-center justify-content-between">
                                                                        <label for="">Ori. Price</label>
                                                                        <input type="number" min="0" wire:model="sizeOriginalPrice.{{$item->id}}" class="form-control form-control-sm mt-1 w-75">
                                                                    </div>
                                                                    <div class="d-flex mb-2 align-items-center justify-content-between">
                                                                        <label for="">Price <span class="text-danger">*</span></label>
                                                                        <input type="number" min="0" wire:model="sizePrice.{{$item->id}}" class="form-control form-control-sm mt-1 w-75">
                                                                    </div>
                                                                    <div class="d-flex mb-2 align-items-center justify-content-between">
                                                                        <label for="">Delivery </label>
                                                                        <input type="number" min="0" wire:model="sizeDeliveryCharge.{{$item->id}}" class="form-control form-control-sm mt-1 w-75">
                                                                    </div>
                                                                    <div class="d-flex align-items-center mx-4">
                                                                        <label for="">Status :</label>
                                                                        <div class="form-check form-switch">
                                                                            <input wire:model="sizeStatus.{{$item->id}}" class="form-check-input form-control mx-3" type="checkbox" checked>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @error('sizes')  <small class="mx-5 text-danger">{{$message}}</small>  @enderror
                                            </div>
                                        @else
                                            <p class="text-danger mx-3">Sub-Category not selected or sizes not awailable !!!</p>
                                        @endif

                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="images-tab-plane" role="tabpanel" wire:ignore.self>
                                <div class="row mt-3">
                                    <div class="mb-3">
                                        <label for="">Upload Product Images <span class="text-danger">*</span></label>
                                        <input type="file" wire:model="images" class="form-control mt-1" multiple>
                                        <small class="text-danger">@error('images'){{$message}}@enderror</small>
                                        <small class="text-danger">@error('images.*'){{$message}}@enderror</small>
                                    </div>
                                </div>
                                <div class="mt-3 row">
                                    @foreach ($product->getMedia() as $item)
                                        <div class="col-md-2">
                                            <img src="{{$item->getUrl()}}" class="img-fluid rounded border" style="width:180px;height:200px;object-fit:cover">
                                            <a wire:click.prevent="deleteProductImage({{$item->id}})" class="btn btn-sm btn-secondary rounded mx-5 my-2">Remove</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn bg-blue text-light float-end mt-2 mx-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('script')
    <script>
        document.getElementById('select-color').addEventListener('click',()=>{
            setTimeout(() => {
                const colorOptionButton = document.querySelectorAll('.color-option-btn');
                colorOptionButton.forEach(function(colorBtn) {
                    console.log(colorBtn);
                    colorBtn.addEventListener("click", function() {
                        colorOptionButton.forEach(function(btn) {
                            btn.classList.remove('color-select');
                        });
                        colorBtn.classList.add('color-select')
                    });
                });
            }, 300);
        });
    </script>
    @endsection
</div>
