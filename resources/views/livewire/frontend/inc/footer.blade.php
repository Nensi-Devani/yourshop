<div>
    <div class="mt-5">
        <div class="footer-area text-white py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="footer-heading text-white fs-4">{{$app->name}}</h4>
                        <div class="footer-underline"></div>
                        <p>
                            {{$app->description}}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading text-white fs-4">Quick Links</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="{{url('/')}}" class="text-white text-decoration-none">Home</a></div>
                        <div class="mb-2"><a href="{{url('/login')}}" class="text-white text-decoration-none">Login</a></div>
                        <div class="mb-2"><a href="{{url('/register')}}" class="text-white text-decoration-none">Register</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading text-white fs-4">Shop Now</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="{{url('/categories')}}" class="text-white text-decoration-none">Collections</a></div>
                        <div class="mb-2"><a href="{{url('/')}}" class="text-white text-decoration-none">Trending Products</a></div>
                        <div class="mb-2"><a href="{{url('/new-arrivals')}}" class="text-white text-decoration-none">New Arrivals Products</a></div>
                        <div class="mb-2"><a href="{{url('/featured')}}" class="text-white text-decoration-none">Featured Products</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading text-white fs-4">Reach Us</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2">
                            <p>
                                <i class="fa fa-map-marker"></i> {{$app->address}}
                            </p>
                        </div>
                        <div class="mb-2">
                                <i class="fa fa-phone"></i> +91 {{$app->phone_no1}}
                                @if($app->phone_no2)
                                    / {{$app->phone_no2}}
                                @endif
                        </div>
                        <div class="mb-2">
                                <i class="fa fa-envelope"></i> {{$app->email}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class=""> &copy; {{$app->copyright_text}}
                    </div>
                    <div class="col-md-4 text-white">
                        <div class="social-media">
                            @if ($app->facebook_link || $app->twitter_link || $app->instagram_link || $app->youtube_link)
                                Get Connected:
                                @if ($app->facebook_link)
                                    <a href="{{url($app->facebook_link)}}" target="_blank"> <i class="fa-brands fa-facebook-f"></i></a>
                                @endif
                                @if ($app->twitter_link)
                                    <a href="{{url($app->twitter_link)}}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                @endif
                                @if ($app->instagram_link)
                                    <a href="{{url($app->facebook_link)}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                @endif
                                @if ($app->youtube_link)
                                    <a href="{{url($app->youtube_link)}}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

