   <!-- Banner Section Start -->
   <section class="banner--section">
    <!-- Banner Slider Start -->
    <div class="banner--slider owl-carousel" data-owl-dots="true" data-owl-dots-style="2">
        <!-- Banner Item Start -->
        @foreach($sliders as $slider)
        <div class="banner--item" data-bg-img="{{ asset('uploads/sliders/'. $slider->image) }}" data-overlay="0.75">
            <div class="vc--parent">
                <div class="vc--child">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <!-- Banner Content Start -->
                                <div class="banner--content pt--70 pb--80 text-center">
                                    <div class="title">
                                        <h1 class="h1 text-lightgray">{{ $slider->title }}</h1>
                                    </div>

                                    <div class="sub-title">
                                        <h2 class="h2 text-lightgray">{{ strip_tags($slider->description) }}</h2>
                                    </div>

                                </div>
                                <!-- Banner Content End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Banner Item End -->


    </div>
    <!-- Banner Slider End -->
</section>
<!-- Banner Section End -->
