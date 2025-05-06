@extends('layouts.app')
    @section('title','Yourshop | 404 page not found')
    @section('content')
        <div class="container mx-auto mt-3 p-5 d-flex flex-column align-items-center justify-content-center">
            <h1 style="font-size: 12rem" class="text-dark-blue">404</h1>
            <h3 class="text-capitalize">Page not found</h3>
            <p class="text-muted fs-5">The page you're looking for does not seem to exist</p>
            <a href="{{url('/')}}" class="text-decoration-none btn btn-dark-blue text-light px-5 mt-2">Go To Home</a>
        </div>
    @endsection
