@extends('layouts.admin')
@section('title')
        Edit Category
    @endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Category
                    <a href="{{url('admin/category')}}" class="btn btn-primary rounded text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug <span class="text-danger">*</span></label>
                            <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Description <span class="text-danger">*</span></label>
                            <textarea name="description" rows="3" style="resize:none" class="form-control">{{$category->description}}</textarea>
                            @error('description')
                                    <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <div class="form-check form-switch">
                                <input name="status" class="form-check-input form-control mx-auto" type="checkbox" {{$category->status==1?'checked':''}}>
                            </div>
                            @error('status')  <small class="text-danger">{{$message}}</small>  @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="text-primary">Old Category Avatar : </p>
                            <img src="{{$category->getFirstMediaUrl('category_avatar')}}" class="image-fluid rounded mb-3 border" style="width:100px;height:100px">
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="text-primary">Old Category Image : </p>
                            <img src="{{$category->getFirstMediaUrl('category_image')}}" class="image-fluid rounded mb-3 border" style="width:10c0px;height:100px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-warning">Choose the file to change the Category Avatar !!</label>
                            <input type="file" name="category_avatar" class="form-control" value="{{old('image')}}" >
                            @error('category_avatar')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-warning">Choose the file to change the Category Image !!</label>
                            <input type="file" name="category_image" class="form-control" value="{{old('image')}}" >
                            @error('category_image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <h4>SEO Tags</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Title <span class="text-danger">*</span></label>
                            <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control">
                            @error('meta_title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Keyword <span class="text-danger">*</span></label>
                            <input type="text" name="meta_keyword" value="{{$category->meta_keyword}}" class="form-control">
                            @error('meta_keyword')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description <span class="text-danger">*</span></label>
                        <textarea name="meta_description" value="" rows="3" style="resize:none" class="form-control">{{$category->meta_description}}</textarea>
                        @error('meta_description')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="submit" value="Save" class="btn bg-blue text-white float-end">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
