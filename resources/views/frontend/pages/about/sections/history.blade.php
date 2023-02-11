
        <!-- History Section Start -->
        <section class="section bg-lighter pt--80 pb--20">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section--title pb--50 text-center">
                    <div class="title">
                        <h2 class="h2">{{ __('site.Our History') }}</h2>
                    </div>

                    <div class="sub-title">
                        <p>{{ __('site.Lorem Ipsum is simply dummy text of the printing and typesetting industry. make a type specimen book.') }} </p>
                    </div>
                </div>
                <!-- Section Title End -->

                <!-- Timeline Start -->
                <div class="timeline">
                    <ul class="nav MasonryRow" data-scroll-reveal="group">
                        @foreach($histories as $history)
                        <li>
                            <div class="timeline--item mb--60">
                                <div class="timeline--content fs--14">
                                    <p>{{ strip_tags($history->content) }}</p>
                                </div>

                                <div class="timeline--footer fs--14 bg-primary">
                                    <p>{{ get_month($history->date) }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Timeline End -->
            </div>
        </section>
        <!-- History Section End -->
