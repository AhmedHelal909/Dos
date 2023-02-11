     <!-- About Section Start -->
     <div class="section pt--80 pb--40">
        <div class="container">
            <div class="row row--md-vc">
                <div class="col-md-6 pb--40">
                    <img src="{{ app()->getLocale() == 'en' ? get_image(__('site.images_.' . \App\Enum\ImageEnum::getAboutUsSecondEn())) : get_image(__('site.images_.' . \App\Enum\ImageEnum::getAboutUsSecondAr()))}}" alt="About Us">
                </div>

                <div class="col-md-6 pb--40">
                    <!-- Text Block Start -->
                    <div class="text--block">
                        <div class="content fs--14">
                            <h3>{{__('site.about')}}</h3>

                            <p>
                                {{ app()->getLocale() == 'en' ? get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getAboutUs())) : get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getAboutUsAr()))}}
                            </p>
                        </div>
                    </div>
                    <!-- Text Block End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->
