<div>
    @section('title','My Profile')
    <section class="">
        <div class="container py-3 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-md-12 col-xl-4 ">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show py-3 d-flex" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="20" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <h6 class="mt-1">{{session('message')}}</h6>
                    <button type="button" class="btn btn-sm mt-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show py-3 d-flex" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="20" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <h6 class="mt-1">{{session('error')}}</h6>
                    <button type="button" class="btn btn-sm mt-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

              <div class="card shadow" style="border-radius: 15px;">
                <div class="card-body text-center">
                  <div class="mt-3 mb-4 position-relative">
                    @if ($user->getFirstMediaUrl())
                        <img src="{{asset($user->getFirstMediaUrl())}}"
                        class="rounded-circle img-fluid border" style="width: 100px;height:100px" />
                    @else
                        <img src="{{asset('images/default.jpeg')}}"
                        class="rounded-circle img-fluid border" style="width: 100px;height:100px" />
                    @endif
                    {{-- image update --}}
                        <label for="image" class="text-white bg-blue py-1 px-2 rounded-circle position-absolute" style="top:70%;right:35%"> <small class="fa fa-camera"></small> </label>
                        <input type="file" wire:model.live="image" id="image" class="d-none">
                  </div>
                    @if ($edit)
                        <input type="text" wire:model='name' class="form-control form-control-sm" autofocus>
                    @else
                        <h4 class="mb-2">{{$name}}</h4>
                    @endif
                    <p class="text-muted mb-4">{{$email}}</p>
                    @if ($changePassword)
                        <div class="row pt-1 d-flex flex-column">
                            <div class="col-12 mb-3">
                                <h6>Old Password</h6>
                                <input type="text" wire:model="old_password" class="form-control form-control-sm">
                                @error('old_password')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-12 mb-3">
                                <h6>New Password</h6>
                                <input type="text" wire:model="new_password" class="form-control  form-control-sm">
                                @error('new_password')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-12 mb-3">
                                <h6>Confirm Password</h6>
                                <input type="text" wire:model="confirm_password" class="form-control  form-control-sm">
                                @error('confirm_password')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                    @endif
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="col-md-5">
                            @if ($edit)
                                <button type="button" wire:click.prevent='updateProfile' class="btn btn-info rounded w-100 mx-auto"> Save </button>
                            @else
                                <button type="button" wire:click.prevent='editProfile' class="btn btn-outline-info rounded w-100 mx-auto"> Edit </button>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if ($changePassword)
                                <button type="button" wire:click.prevent='setNewPassword' class="btn btn-primary rounded w-100"> Save Password </button>
                            @else
                                <button type="button" wire:click.prevent='changePass' class="btn btn-outline-primary rounded w-100"> Change Password </button>
                            @endif
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>
