<div>
    @section('title','Settings')
    <div class="row">
        {{-- pre loader --}}
        <div wire:loading>
            <div class="row vw-100 p-0 m-0" style="height: 70vh">
                <div class="col-12 col-md-12 col-lg-12 m-0 p-0">
                    <div class="d-flex justify-content-center align-items-center h-100 w-100" style="margin-left:-100px">
                        <div class="spinner-grow text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div wire:loading.remove>
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show py-3 d-flex" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="20" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <h6 class="mt-1">{{session('message')}}</h6>
                        <button type="button" class="btn btn-sm mt-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- website --}}
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="d-flex align-items-center justify-content-between">Website</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="website">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Website Name/Title <span class="text-danger">*</span></label>
                                    <input type="text" wire:model="name" class="form-control" value="{{old('name')}}" placeholder="YourShop">
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        @if ($setting)
                                            @if ($setting->getFirstMediaUrl('big_screen'))
                                                <div class="col-md-6 d-flex flex-column">
                                                    <label for="">Big Screen Logo</label>
                                                    <img src="{{asset($setting->getFirstMediaUrl('big_screen'))}}" class="img-fluid rounded w-50" alt="Big-logo">
                                                </div>
                                            @endif
                                            @if ($setting->getFirstMediaUrl('small_screen'))
                                                <div class="col-md-6 d-flex flex-column">
                                                    <label for="">Small Screen Logo</label>
                                                    <img src="{{asset($setting->getFirstMediaUrl('small_screen'))}}" class="img-fluid rounded w-50" alt="Big-logo">
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Big Screen Logo </label>
                                    <input type="file" wire:model="bigScreenLogo" class="form-control" value="{{old('slug')}}">
                                    @error('bigScreenLogo')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Small Screen Logo </label>
                                    <input type="file" wire:model="smallScreenLogo" class="form-control" value="{{old('slug')}}">
                                    @error('smallScreenLogo')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" value="Save" class="btn bg-blue text-white float-end">
                        </form>
                    </div>
                </div>

                {{-- information  --}}
                <div class="card mt-3 shadow">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="">Website Information</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="websiteInformation">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Website Description <span class="text-danger">*</span></label>
                                    <textarea wire:model="description" class="form-control" style="resize: none" cols="30" rows="4" placeholder="xyz xyz xyz...."></textarea>
                                    @error('description')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Address <span class="text-danger">*</span></label>
                                    <textarea wire:model="address" class="form-control" style="resize: none" cols="30" rows="4" placeholder="xyz xyz xyz...."></textarea>
                                    @error('address')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Pincode <span class="text-danger">*</span></label>
                                    <input type="number" wire:model="pincode" class="form-control" placeholder="0000112">
                                    @error('pincode') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email <span class="text-danger">*</span></label>
                                    <input type="text" wire:model="email" class="form-control" placeholder="youremail@gmail.com">
                                    @error('email') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone No. 1 <span class="text-danger">*</span></label>
                                    <input type="number" wire:model="phone_no1" class="form-control" placeholder="1111111111">
                                    @error('phone_no1') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone No. 2</label>
                                    <input type="number" wire:model="phone_no2" class="form-control">
                                    @error('phone_no2') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Copyright Text <span class="text-danger">*</span></label>
                                    <input type="text" wire:model="copyrightText" class="form-control">
                                    @error('copyrightText') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <input type="submit" value="Save" class="btn bg-blue text-white float-end">
                        </form>
                    </div>
                </div>

                {{-- social media --}}
                <div class="card mt-3 shadow">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="">Social Links</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="socialLink">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for=""><i class="fa-brands fa-facebook-f text-primary"></i> Facebook</label>
                                    <input type="text" wire:model="facebook_link" class="form-control" placeholder="xyz.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for=""><i class="fa-brands fa-twitter text-primary"></i> Twitter</label>
                                    <input type="text" wire:model="twitter_link" class="form-control" placeholder="xyz.com">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for=""><i class="fa-brands fa-instagram" style="color:purple"></i> Instagram</label>
                                    <input type="text" wire:model="instagram_link" class="form-control" placeholder="xyz.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for=""><i class="fa-brands fa-youtube text-danger"></i> YouTube</label>
                                    <input type="text" wire:model="youtube_link" class="form-control" placeholder="xyz.com">
                                </div>
                            </div>
                            <input type="submit" value="Save" class="btn bg-blue text-white float-end">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
