<div>
@section('title',' Add User')
<div class="row">
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $item)
                {{$item}}
        @endforeach
    @endif --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add User
                    <a wire:navigate href="{{url('admin/users')}}" class="btn btn-primary rounded text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="storeUser">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name <span class="text-danger">*</span></label>
                            <input type="text" wire:model="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="text" wire:model="email" class="form-control" value="{{old('slug')}}">
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Password <span class="text-danger">*</span></label>
                            <input type="text" wire:model="password" class="form-control" value="{{old('meta_title')}}" >
                            @error('password')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Role <span class="text-danger">*</span></label>
                            <select wire:model="role" class="form-select">
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                                @error('role')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Profile Picture <span class="text-danger">*</span></label>
                            <input type="file" name="category_avatar" class="form-control" value="{{old('image')}}" >
                            @error('category_avatar')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div> --}}
                    <input type="submit" value="Save" class="btn bg-blue text-white float-end">
                </form>
            </div>
        </div>
    </div>
</div>


</div>
