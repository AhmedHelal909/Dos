
        <!-- Why Choose Us Section Start -->
        <section class="section bg-lighter pt--80 pb--20">
            <div class="container">
                <div class="row row--md-vc">
                    <div class="col-md-6 pb--50">
                        <!-- Text Block Start -->
                        <div class="text--block pb--10">
                            <div class="title">
                                <h2 class="h2 fw--600">{{__('site.about')}}</h2>
                            </div>

                            <div class="content">
                                <p>

                                    {{ app()->getLocale() == 'en' ? get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getAboutUs())) : get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getAboutUsAr()))}}
                                </p>
                            </div>
                        </div>
                        <!-- Text Block End -->


                    </div>

                    <div class="col-md-6 pb--60">
                        <!-- Video Popup Start -->
                        <div class="video--popup style--1" data-overlay="0.3">
                            <img src="{{ app()->getLocale() == 'en' ? get_image(__('site.images_.' . \App\Enum\ImageEnum::getAboutUsFirstEn())) : get_image(__('site.images_.' . \App\Enum\ImageEnum::getAboutUsFirstAr()))}}" alt="Video Popup">


                        </div>
                        <!-- Video Popup End -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Why Choose Us Section End -->
