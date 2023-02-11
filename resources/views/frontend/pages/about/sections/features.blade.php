   <!-- Features Section Start -->
   <section class="section bg-lighter pt--80 pb--40">
    <div class="container">
        <div class="row AdjustRow">
            <div class="col-md-3 col-xs-6 col-xxs-12 pb--40">
                <!-- Feature Item Start -->
                <div class="feature--item bg-default text-center">
                    <div class="title">
                        <h2 class="h1 ff--default text-primary"><span data-trigger="counterup">
                                {{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getStores())) }}
                            </span>k+</h2>
                    </div>

                    <div class="sub-title">
                        <h3 class="h2 fs--16">{{ __('site.Stories / Topics Created') }}</h3>
                    </div>

                    <div class="desc">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <!-- Feature Item End -->
            </div>

            <div class="col-md-3 col-xs-6 col-xxs-12 pb--40">
                <!-- Feature Item Start -->
                <div class="feature--item bg-default text-center">
                    <div class="title">
                        <h2 class="h1 ff--default text-primary"><span data-trigger="counterup">
                                {{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getMemberOnline())) }}
                            </span>k+</h2>
                    </div>

                    <div class="sub-title">
                        <h3 class="h2 fs--16">{{ __('site.Member Online Right Now') }}</h3>
                    </div>

                    <div class="desc">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <!-- Feature Item End -->
            </div>

            <div class="col-md-3 col-xs-6 col-xxs-12 pb--40">
                <!-- Feature Item Start -->
                <div class="feature--item bg-default text-center">
                    <div class="title">
                        <h2 class="h1 ff--default text-primary"><span data-trigger="counterup">
                                {{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getActiveGroup())) }}
                            </span>k+</h2>
                    </div>

                    <div class="sub-title">
                        <h3 class="h2 fs--16">{{ __('site.Active Group / Meeting Room') }}</h3>
                    </div>

                    <div class="desc">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <!-- Feature Item End -->
            </div>

            <div class="col-md-3 col-xs-6 col-xxs-12 pb--40">
                <!-- Feature Item Start -->
                <div class="feature--item bg-default text-center">
                    <div class="title">
                        <h2 class="h1 ff--default text-primary"><span data-trigger="counterup">
                                {{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getNewEvent())) }}
                            </span>k+</h2>
                    </div>

                    <div class="sub-title">
                        <h3 class="h2 fs--16">{{ __('site.New Event In Every Week') }}</h3>
                    </div>

                    <div class="desc">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <!-- Feature Item End -->
            </div>
        </div>
    </div>
</section>
