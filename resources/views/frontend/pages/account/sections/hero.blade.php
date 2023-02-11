    <!-- Cover Header Start -->
    <div class="cover--header pt--80 text-center" data-bg-img="{{asset('frontEnd/img/cover-header-img/bg-01.jpg')}}" data-overlay="0.6" data-overlay-color="white">
        <div class="container">
            <div class="cover--avatar online" data-overlay="0.3" data-overlay-color="primary">
                <img src="{{ asset('uploads/customers/'.(auth()->guard('customer_web')->user()->image ?? 'default.png') ) }}" alt="">
            </div>

            <div class="cover--user-name">
                <h2 class="h3 fw--600">{{ auth()->guard('customer_web')->user()->name }}</h2>
            </div>
        </div>
    </div>
    <!-- Cover Header End -->
