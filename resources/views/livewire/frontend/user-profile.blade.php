<div class="">
   <div class="">
    @section('title','My Profile')
    <section class="my-5">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <span class="text-center heading fs-4" >
                My Profile
            </span>
        </div>
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100 ">
            <div class="col col-lg-8 mb-4 mb-lg-0 ">
              <div class="card mb-3 shadow" style="border-radius: .5rem">
                <div class="row g-0">
                  <div class="col-md-4 gradient-custom text-center text-dark"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    @if ($user->getFirstMediaUrl())
                        <img src="{{asset($user->getFirstMediaUrl())}}"
                        class="rounded-circle img-fluid mt-5 border" style="width: 180px;height:180px" />
                    @else
                        <img src="{{asset('images/default.jpeg')}}"
                        class="rounded-circle img-fluid mt-5 border" style="width: 180px;height:180px" />
                    @endif
                    {{-- image update --}}
                    <label for="image" class="text-white bg-blue py-1 px-2 rounded-circle position-absolute cursor-pointer" style="top:44%;right:77%"> <small class="fa fa-camera" aria-hidden="true"></small> </label>
                    <input type="file" wire:model.live="image" id="image" class="d-none">

                    {{-- <h5>{{auth()->user()->name}}</h5> --}}

                    <div class="">
                        @if ($edit)
                            <a  wire:click.prevent="updateProfile" class="cursor-pointer text-decoration-none text-dark-blue">
                                <i class="fa fa-check mt-4"></i> Save
                            </a>
                        @else
                            <a wire:click.prevent="editProfile" class="cursor-pointer text-decoration-none text-dark-blue">
                                <i class="fas fa-edit mt-4"></i> Edit
                            </a>
                        @endif
                        {{-- change password --}}
                        @if ($changePassword)
                            <a wire:click.prevent="setNewPassword" class="cursor-pointer d-block text-decoration-none text-dark-blue">
                                <i class="fa fa-check mt-2"></i> Save Password
                            </a>
                        @else
                            <a wire:click.prevent="changePass" class="cursor-pointer d-block text-decoration-none text-dark-blue">
                                <i class="fa fa-lock mt-2"></i> Change Password
                            </a>
                        @endif

                    </div>
                  </div>
                @if ($edit)
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h6 class="text-dark-blue">Edit Profile</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>Name</h6>
                                    <input type="text" wire:model="name" class="form-control form-control-sm">
                                    @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Email</h6>
                                    <input type="text" readonly wire:model="email" class="form-control form-control-sm">
                                </div>
                            </div>
                            <h6 class="text-dark-blue">Delivery Address</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-12 mb-3">
                                    <h6>Address</h6>
                                    <textarea wire:model="address" id="" cols="30" rows="3" class="form-control" style="resize: none"></textarea>
                                    @error('address')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Pin Code</h6>
                                    <input type="number" wire:model="pin_code" class="form-control form-control-sm">
                                    @error('pin_code')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Phone No.</h6>
                                    <input type="number" wire:model="phone_no" class="form-control form-control-sm">
                                    @error('phone_no')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($changePassword)
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h6 class="text-dark-blue">Change Password</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1 d-flex flex-column justify-content-center">
                                <div class="col-10 mb-3">
                                    <h6>Old Password</h6>
                                    <input type="text" wire:model="old_password" class="form-control form-control-sm">
                                    @error('old_password')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="col-10 mb-3">
                                    <h6>New Password</h6>
                                    <input type="text" wire:model="new_password" class="form-control form-control-sm">
                                    @error('new_password')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="col-10 mb-3">
                                    <h6>Confirm Password</h6>
                                    <input type="text" wire:model="confirm_password" class="form-control form-control-sm">
                                    @error('confirm_password')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-8">
                        <div class="card-body p-4">
                        <h6 class="text-dark-blue">Information</h6>
                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">
                            <div class="col-6 mb-3">
                            <h6>Name</h6>
                            <p class="text-muted">{{$name}}</p>
                            </div>
                            <div class="col-6 mb-3">
                            <h6>Email</h6>
                            <p class="text-muted">{{$email}}</p>
                            </div>
                        </div>
                        <h6 class="text-dark-blue">Delivery Address</h6>
                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">
                            <div class="col-12 mb-3">
                                <h6>Address</h6>
                                <p class="text-muted">{{$address==null?'Address not found !':$address}}</p>
                            </div>
                            <div class="col-6 mb-3">
                                <h6>Pin Code</h6>
                                <p class="text-muted">{{$pin_code==null?'Pin Code not found !':$pin_code}}</p>
                            </div>
                            <div class="col-6 mb-3">
                                <h6>Phone No.</h6>
                                <p class="text-muted">{{$phone_no==null?'Phone no. not found !':$phone_no}}</p>
                            </div>
                        </div>
                        </div>
                    </div>
                @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
   </div>
</div>
