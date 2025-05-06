@extends('layouts.admin')
@section('title')
        Add Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Add Product
                        <a href="{{url('admin/products')}}" class="btn btn-primary rounded text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                        <option value="{{old('category')}}">Select Category</option>
                                        @foreach ($category as $item)
                                            <option value="{{$item->id}}" {{old('category') == $item->id ?'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">@error('category'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="">Select Sub-Category</label>
                                    <select name="sub_category" class="form-select mt-1">
                                        <option value="{{old('sub_category')}}">Select Sub-Category</option>
                                        @foreach($subCategories as $item)
                                            <option value="{{$item->id}}" {{old('sub_category') == $item->id ?'selected':''}}>{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">@error('sub_category'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control mt-1" placeholder="Xyz">
                                    <small class="text-danger">@error('name'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Slug</label>
                                    <input type="text" name="slug" value="{{old('slug')}}" class="form-control mt-1" placeholder="xyz">
                                    <small class="text-danger">@error('slug'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Select Brand</label>
                                    <select name="brand" class="form-select mt-1">
                                        <option value="{{old('brand')}}">Select Brand</option>
                                        @foreach ($brand as $item)
                                            <option value="{{$item->id}}" {{old('brand') == $item->id ?'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">@error('brand'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Small Description</label>
                                    <textarea name="small_description" placeholder="Xyz small description" class="form-control" cols="30" rows="3" style="resize: none">{{old('small_description')}}</textarea>
                                    <small class="text-danger">@error('small_description'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" placeholder="Xyz description" class="form-control" cols="30" rows="3" style="resize: none">{{old('description')}}</textarea>
                                    <small class="text-danger">@error('description'){{$message}}@enderror</small>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="seo-tab-plane" role="tabpanel">
                                <div class="my-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" value="{{old('meta_title')}}" class="form-control mt-1" placeholder="xyz">
                                    <small class="text-danger">@error('meta_title'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <input type="text" name="meta_description" value="{{old('meta_description')}}" class="form-control mt-1" placeholder="xyz description">
                                    <small class="text-danger">@error('meta_description'){{$message}}@enderror</small>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" value="{{old('meta_keyword')}}" class="form-control mt-1" placeholder="xyz">
                                    <small class="text-danger">@error('meta_keyword'){{$message}}@enderror</small>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="details-tab-plane" role="tabpanel">
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Original Price</label>
                                            <input type="text" name="original_price" value="{{old('original_price')}}" class="form-control mt-1">
                                            <small class="text-danger">@error('original_price'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Selling Price</label>
                                            <input type="text" name="selling_price" value="{{old('selling_price')}}" class="form-control mt-1">
                                            <small class="text-danger">@error('selling_price'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Quantity</label>
                                            <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control mt-1">
                                            <small class="text-danger">@error('quantity'){{$message}}@enderror</small>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending</label>
                                            <input type="checkbox" name="trending" style="width: 30px;height:30px" class="form-check mt-1">
                                            <small class="text-danger">@error('trending'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" style="width: 30px;height:30px" class="form-check mt-1">
                                            <small class="text-secondary">Checked = Hidden, Unchecked = Visible</small>
                                            <small class="text-danger">@error('status'){{$message}}@enderror</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="images-tab-plane" role="tabpanel">
                                <div class="row mt-3">
                                    <div class="mb-3">
                                        <label for="">Upload Product Images</label>
                                        <input type="file" name="images[]" class="form-control mt-1" multiple>
                                        <small class="text-danger">@error('images'){{$message}}@enderror</small>
                                    </div>
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
                                                            <input type="checkbox" name="colors[{{$item->id}}]" value="{{$item->id}}" class="form-check mt-1" style="width:25px;height:25px">
                                                            <span class="mt-2 mx-1">{{$item->name}}</span>
                                                        </div>
                                                        <br>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                           <span> Quantity : </span>
                                                           <input type="number" name="colorquantity[{{$item->id}}]" min="1" class="form-control form-control-sm border border-secondary mx-2" style="width: 130px">
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
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn bg-blue text-light float-end mt-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
