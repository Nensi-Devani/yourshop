@extends('layouts.admin')
@section('title')
        Edit Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show py-3" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="20" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <small class="fw-bold">{{session('message')}}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- color quantity update & delete alert  --}}
            <div class="alert alert-success alert-dismissible fade show py-3" role="alert" id="alertmsg" style="display: none">
                <svg class="bi flex-shrink-0 me-2" width="20" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <small class="fw-bold" id="message"></small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            {{-- end color quantity update & delete alert --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Edit Product
                        <a href="{{url('admin/products')}}" class="btn btn-primary rounded text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-plane" type="button" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo-tab-plane" type="button" aria-selected="false">SEO Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-plane" type="button" aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images-tab-plane" type="button" aria-selected="false">Product Images</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-plane" type="button" aria-selected="false">Product Colors</button>
                            </li>
                        </ul>
                        <div class="tab-content border border-1 px-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-plane" role="tabpanel">
                                <div class="mb-3 mt-3">
                                    <label for="">Select Category</label>
                                    <select name="category" class="form-select mt-1">
                                        <option value="">Select Category</option>
                                        @foreach ($category as $item)
                                            <option value="{{$item->id}}" {{$product->category_id == $item->id ?'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">@error('category'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="">Select Sub-Category</label>
                                    <select name="sub_category" class="form-select mt-1">
                                        <option value="{{old('sub_category')}}">Select Sub-Category</option>
                                        @foreach($subCategories as $item)
                                            <option value="{{$item->id}}" {{$product->sub_category_id == $item->id ?'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">@error('sub_category'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control mt-1">
                                    <small class="text-danger">@error('name'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Slug</label>
                                    <input type="text" name="slug" value="{{$product->slug}}" class="form-control mt-1">
                                    <small class="text-danger">@error('slug'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Select Brand</label>
                                    <select name="brand" class="form-select mt-1">
                                        <option value="">Select Brand</option>
                                        @foreach ($brand as $item)
                                            <option value="{{$item->id}}" {{$product->brand_id == $item->id ?'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">@error('brand'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Small Description</label>
                                    <textarea name="small_description" class="form-control" cols="30" rows="3" style="resize: none">{{$product->small_description}}</textarea>
                                    <small class="text-danger">@error('small_description'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="3" style="resize: none">{{$product->description}}</textarea>
                                    <small class="text-danger">@error('description'){{$message}}@enderror</small>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="seo-tab-plane" role="tabpanel">
                                <div class="my-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control mt-1">
                                    <small class="text-danger">@error('meta_title'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <input type="text" name="meta_description" value="{{$product->meta_description}}" class="form-control mt-1">
                                    <small class="text-danger">@error('meta_description'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" value="{{$product->meta_keyword}}" class="form-control mt-1">
                                    <small class="text-danger">@error('meta_keyword'){{$message}}@enderror</small>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="details-tab-plane" role="tabpanel">
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Original Price</label>
                                            <input type="text" name="original_price" value="{{$product->original_price}}" class="form-control mt-1">
                                            <small class="text-danger">@error('original_price'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Selling Price</label>
                                            <input type="text" name="selling_price" value="{{$product->selling_price}}" class="form-control mt-1">
                                            <small class="text-danger">@error('selling_price'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Quantity</label>
                                            <input type="text" name="quantity" value="{{$product->quantity}}" class="form-control mt-1">
                                            <small class="text-danger">@error('quantity'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Color</label>
                                            <div class="">
                                                {{-- {{$product->color->code}} --}}
                                                @forelse ($colors as $item)
                                                    @if ($item->id == $product->color_id)
                                                        <label style="background-color: {{ $item->code }}; cursor: pointer;" class="color-option-btn color-select p-3 mx-1 rounded-circle">
                                                            <input type="radio" name="color" value="{{ $item->id }}" style="display: none;">
                                                        </label>
                                                    @else
                                                        <label style="background-color: {{ $item->code }}; cursor: pointer;" class="color-option-btn    p-3 mx-1 rounded-circle">
                                                            <input type="radio" name="color" value="{{ $item->id }}" style="display: none;">
                                                        </label>
                                                    @endif
                                                @empty
                                                    <small class="text-danger">No Colors Found !!!</small>
                                                @endforelse
                                            </div>
                                            <small class="text-danger">@error('color'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending</label>
                                            <div class="form-check form-switch">
                                                <input name="trending" class="form-check-input form-control mx-auto" type="checkbox" {{$product->trending==1?'checked':''}}>
                                            </div>
                                            @error('trending')  <small class="text-danger">{{$message}}</small>  @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <div class="form-check form-switch">
                                                <input name="status" class="form-check-input form-control mx-auto" type="checkbox" {{$product->status==1?'checked':''}}>
                                            </div>
                                            @error('status')  <small class="text-danger">{{$message}}</small>  @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="images-tab-plane" role="tabpanel">
                                <div class="row mt-3">
                                    <div class="mb-3">
                                        <label class="text-warning">Add new images for the Product !!!</label>
                                        <input type="file" name="images[]" class="form-control mt-1" multiple>
                                        <small class="text-danger">@error('images'){{$message}}@enderror</small>
                                    </div>
                                </div>
                                <p class="text-primary my-2">Product Old Images : </p>
                                <div class="row">
                                    @foreach ($product->getMedia() as $item)
                                        <div class="col-md-2">
                                            <img src="{{$item->getUrl()}}" class="img-fluid rounded border" style="width:180px;height:200px;object-fit:cover">
                                            <a href="{{url('admin/products-img/'.$item->id.'/delete')}}" class="btn btn-sm btn-secondary rounded mx-5 my-2">Remove</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="color-tab-plane" role="tabpanel">
                                <div class="row mt-3">
                                    <div class="mb-3">
                                        <label for="" class="mb-1">Select Color</label>
                                        <div class="row">
                                            @forelse ($colors as $item)
                                                <div class="col-md-3">
                                                    <div class="p-2 border border-primary rounded mt-2">
                                                        <div class="d-flex mx-4">
                                                            <label style="background-color: {{ $item->code }}; cursor: pointer;" class="color-option-multiple-btn  p-3 mx-1 rounded-circle">
                                                                <input type="checkbox" name="colors[{{$item->id}}]" value="{{$item->id}}" class="form-check mt-1 d-none" style="width:25px;height:25px">
                                                            </label>
                                                        </div>
                                                        <br>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                           <span> Quantity : </span>
                                                           <input type="number" name="colorquantity[{{$item->id}}]" min="0" class="form-control form-control-sm border border-secondary mx-2" style="width: 130px">
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                    <div class="col-md-12">No Colors Found !</div>
                                            @endforelse
                                            <small class="text-danger mt-1">@error('colors'){{$message}}@enderror</small>
                                            <small class="text-danger mt-1">@error('colorquantity'){{$message}}@enderror</small>
                                        </div>
                                    </div>

                                    <div class="col-md-10 col-12 mx-auto">
                                        <div class="table-responsive border product-edit-color">
                                            <table class="table table-sm table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Color Name</th>
                                                        <th>Quantity</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($product->productColors as $item)
                                                        <tr class="pro_color_tr">
                                                            <td>
                                                                <span class="px-3 py-2 rounded-circle" style="background-color: {{ $item->color->code }};"></span>
                                                            </td>
                                                            <td>
                                                                <div class="input-group mb-3 mx-auto" style="width:180px">
                                                                    <input type="number" name="" id="" min="0" value="{{$item->quantity}}" class="productColorQuantity form-control form-control-sm border border-3">
                                                                    <button class="updateProductColor btn btn-success text-light btn-sm" type="button" value="{{$item->id}}"><i class="fa-solid fa-check"></i></button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button class="deleteProductColor btn btn-danger btn-sm" type="button" value="{{$item->id}}"><i class="fa-solid fa-trash text-light"></i></button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="text-center text-danger" >No color found for this product !!!</div>
                                                        </tr>
                                                    </td>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                                <input type="submit" value="Save" class="btn bg-blue text-white float-end mt-2"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{-- for delete & update the color --}}
    @push('script')
        <script>
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // update the color quantity
                $(document).on('click','.updateProductColor',function(){
                    var pro_id = "{{$product->id}}";
                    var pro_color_id = $(this).val();
                    var qty = $(this).closest('.pro_color_tr').find('.productColorQuantity').val();

                    var data = {
                        'product_id' : pro_id,
                        'quantity' : qty
                    }
                    $.ajax({
                        url:'/admin/product-color/'+pro_color_id,
                        type:'POST',
                        data:data,
                        success:function(res){
                            $('#message').text(res.message);
                            $('#alertmsg').show();
                        }
                    });
                });
                // delete the color quantity
                $(document).on('click','.deleteProductColor',function(){
                    var pro_color_id = $(this).val();
                    var tr = $(this);
                    $.ajax({
                        url:'/admin/product-color/'+pro_color_id+'/delete',
                        type:'GET',
                        success:function(res){
                            $('#message').text(res.message);
                            $('#alertmsg').show();
                            tr.closest('.pro_color_tr').remove();
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
