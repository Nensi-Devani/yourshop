<div>
        <div class="main-navbar shadow">
        <div class="top-navbar px-md-5 px-lg-5 px-sm-0 px-0 fixed-top mb-5 shadow">
            <div class="container-fluid">
                <div class="row d-flex" style="align-items: space-around">
                    <div class="col-md-4 my-auto d-none d-sm-none d-md-block d-lg-block">
                       <a wire:navigate href="{{url('/')}}">
                            <img src="{{asset($app->getFirstMediaUrl('big_screen'))}}" alt="" style="width:150px;height:50px">
                       </a>
                    </div>
                    <div class="col-md-5 my-auto">
                        <form action="{{url('/search')}}" method="GET" role="search">
                            <div class="input-group">
                                <input type="search" name="search" value="{{Request::get('search')}}" placeholder="Search your product" class="form-control" />
                                <button class="btn bg-white border" type="submit">
                                    <i class="fa fa-search text-dark-blue"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 my-md-auto mt-2">
                        <ul class="nav justify-content-end">
                            @guest
                            <span class="d-flex fs-6">
                                <a wire:navigate href="{{url('login')}}" class="text-dark-blue text-decoration-none ">Login / </a>
                                <a wire:navigate href="{{url('register')}}" class="text-dark-blue text-decoration-none ">Register</a>
                            </span>
                            @else
                            <li class="nav-item">
                                <a class="nav-link {{request()->is('wishlist')?'active-nav':'in-active-nav'}}" href="{{url('cart')}}" wire:navigate>
                                    <span class="position-relative"> <i class="fa fa-shopping-cart text-dark-blue fs-5"></i>
                                        <small class="position-absolute start-100 translate-middle badge rounded-pill bg-danger px-2">
                                            {{$total_carts}}
                                        </small>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->is('wishlist')?'active-nav':'in-active-nav'}}" href="{{url('wishlist')}}" wire:navigate>
                                    <span class="position-relative"> <i class="fa fa-heart text-dark-blue fs-5"></i>
                                        <small class="position-absolute start-100 translate-middle badge rounded-pill bg-danger px-2">
                                        {{$total_wishlist}}
                                        </small>
                                    </span>
                                </a>
                            </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark-blue" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if (auth()->user()->getFirstMediaUrl())
                                            <img src="{{asset(auth()->user()->getFirstMediaUrl())}}"
                                            class="rounded-circle img-fluid" style="width:30px;height:30px"/>
                                        @else
                                            <img src="{{asset('images/default.jpeg')}}"
                                            class="rounded-circle img-fluid" style="width:30px;height:30px"/>
                                        @endif
                                        <span>{{ Auth::user()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu rounded" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" wire:navigate href="{{url('/profile')}}"><i class="fa fa-user"></i> Profile</a></li>

                                        <li><a class="dropdown-item" wire:navigate href="{{url('orders')}}"><i class="fa fa-list"></i> My Orders</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <i class="fa-solid fa-right-to-bracket"></i> {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="second-navbar navbar navbar-expand-lg mb-5" style="top:70px">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" wire:navigate href="{{url('/')}}">
                    <img src="{{asset($app->getFirstMediaUrl('small_screen'))}}" alt="" style="width:150px;height:50px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars text-light"></i>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        {{-- <li class="nav-item">
                            <a class="nav-link {{request()->is('/')?'active-nav':'in-active-nav'}}" href="{{url('/')}}" wire:navigate>Home</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('categories')?'active-nav':'in-active-nav'}}" href="{{url('/categories')}}" wire:navigate>Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('new-arrivals')?'active-nav':'in-active-nav'}}" href="{{url('/new-arrivals')}}" wire:navigate>New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('featured')?'active-nav':'in-active-nav'}}" href="{{url('/featured')}}" wire:navigate>Featured Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('')?'active-nav':'in-active-nav'}}" href="{{url('/home-applience')}}" wire:navigate>Home Applience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('')?'active-nav':'in-active-nav'}}" href="{{url('/jewellery')}}" wire:navigate>Jewellery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('')?'active-nav':'in-active-nav'}}" href="{{url('/photos-idol')}}" wire:navigate>Photos & idol</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{request()->is('')?'active-nav':'in-active-nav'}}" href="{{url('')}}" wire:navigate>Appliances</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav>
</div>
