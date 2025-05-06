<div>
    @section('title')
        Thank You
    @endsection
    <div class="container mt-5 pt-5">
        <div class="">
            <div class="col-md-5 mx-auto">
                <img src="{{asset('images/thankyou.jpeg')}}" class="w-100 h-100 image-fluid">
            </div>
            <h3 class="text-dark-blue text-center mt-5 mb-3">Thank your for Shopping with YourShop.</h3>
            <div class="col-md-2 mx-auto mt-5">
                <a wire:navigate href="{{url('/')}}" class="btn bg-dark-blue text-light w-100  rounded">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>
