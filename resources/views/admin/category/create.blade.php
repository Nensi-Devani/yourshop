@extends('layouts.admin')
@section('title')
        Add Category
    @endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Category
                    <a href="{{url('admin/category')}}" class="btn btn-primary rounded text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug <span class="text-danger">*</span></label>
                            <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                            @error('slug')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Description <span class="text-danger">*</span></label>
                            <textarea name="description" rows="3" style="resize:none" class="form-control">{{old('description')}} </textarea>
                            @error('description')
                                    <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <div class="form-check form-switch">
                                <input name="status" class="form-check-input form-control mx-auto" type="checkbox" checked>
                            </div>
                            @error('status')  <small class="text-danger">{{$message}}</small>  @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Category Avatar <span class="text-danger">*</span></label>
                            <input type="file" name="category_avatar" class="form-control" value="{{old('image')}}" >
                            @error('category_avatar')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Category Image <span class="text-danger">*</span></label>
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
                            <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}" >
                            @error('meta_title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Keyword <span class="text-danger">*</span></label>
                            <input type="text" name="meta_keyword" class="form-control" value="{{old('meta_keyword')}}" >
                            @error('meta_keyword')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description <span class="text-danger">*</span></label>
                        <textarea name="meta_description" rows="3" style="resize:none" class="form-control">{{old('meta_description')}}</textarea>
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
