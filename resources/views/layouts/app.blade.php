<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- script --}}
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/jQuery-mooZoom-1.0.0.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/jQuery-mooZoom-1.0.0.css')}}"> --}}

    {{-- styles --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/locomotive-scroll.css')}}"> --}}

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">

    {{-- logo --}}
    <link rel="shortcut icon" href="{{asset($app->getFirstMediaUrl('big_screen'))}}" />
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>
<body>
    <div id="app">

        @livewire('frontend.inc.navbar')

            <main>
                @yield('content')
            </main>

        @livewire('frontend.inc.footer')
    </div>
    {{-- scripts --}}
    {{-- <script src="{{asset('assets/js/locomotive-scroll.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/js/custom-user.js')}}"></script> --}}
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/gsap.js')}}"></script>
    <script src="{{asset('assets/js/owl.js')}}"></script>


    @stack('script')
    @yield('script')
    @livewireScripts
    {{-- to use livewire sweet-alerts --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>
</html>
