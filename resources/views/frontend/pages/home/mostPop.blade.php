
        <!-- Most Popular Groups Section Start -->
        <section class="section bg-lighter pt--70 pb--70">
            <div class="container">
                <div class="section--title pb--50 text-center">
                    <div class="title">
                        <h2 class="h2">{{__('site.Meet Our Team')}}</h2>
                    </div>
                </div>

                <!-- Tab Content Start -->
                <div class="tab-content">
                    <!-- Tab Pane Start -->
                    <div class="tab-pane fade in active" id="boxItemsTab01">
                        <!-- Box Items Start -->
                        <div class="box--items owl-carousel" data-owl-items="4" data-owl-margin="30"
                            data-owl-autoplay="true"
                            data-owl-responsive='{"0": {"items": "1"}, "481": {"items": "1"}, "768": {"items": "2"}, "992": {"items": "4"}}'>
                            <!-- Box Item Start -->
                            @foreach($our_team as $team)
                            <div class="box--item text-center">
                                <a href="#" class="img" data-overlay="0.1">
                                    <img src="{{ asset('uploads/ourteams/'. $team->image) }}" alt="{{ $team->name }}">
                                </a>

                                <div class="info">


                                    <div class="title">
                                        <h2 class="h6"><a href="#">{{ $team->name }}</a></h2>
                                    </div>

                                    <div class="desc text-darker">
                                        <p>{{ strip_tags($team->description) }}</p>
                                    </div>
                                    <div class="social">
                                        <ul class="nav">
                                            <li><a href="{{ $team->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="{{ $team->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="{{ $team->google }}"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="{{ $team->website }}"><i class="fa fa-rss"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Box Item End -->

                        </div>
                        <!-- Box Items End -->

                        <!-- Box Controls Start -->
                        <div class="box--controls text-center">
                            <a href="#" class="btn fs--16 btn-default" data-action="prev">
                                <i class="fa fa-caret-left"></i>
                            </a>

                            <a href="#" class="btn fs--16 btn-default" data-action="next">
                                <i class="fa fa-caret-right"></i>
                            </a>
                        </div>
                        <!-- Box Controls End -->
                    </div>
                    <!-- Tab Pane End -->
                </div>
                <!-- Tab Content End -->
            </div>
        </section>
        <!-- Most Popular Groups Section End -->
