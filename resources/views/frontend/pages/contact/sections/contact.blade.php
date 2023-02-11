    <!-- Contact Section Start -->
    <div class="contact--section pt--80 pb--20">
        <div class="container">
            <!-- Map Start -->
            <div class="map mb--80" data-trigger="map" data-map-options='{"latitude": "23.790546", "longitude": "90.375583", "zoom": "16", "api_key": "AIzaSyBK9f7sXWmqQ1E-ufRXV3VpXOn_ifKsDuc"}'></div>
            <!-- Map End -->

            <div class="row">
                <div class="col-md-3 pb--60">
                    <!-- Contact Info Items Start -->
                    <div class="contact-info--items" data-scroll-reveal="group">
                        <!-- Contact Info Item Start -->
                        <div class="contact-info--Item">
                            <div class="title">
                                <h3 class="h4"><i class="mr--10 fa fa-map-o"></i>{{ __('site.Address :') }}</h3>
                            </div>

                            <div class="content fs--14 text-darker mt--4">
                                <p>
                                    {{ app()->getLocale() == 'en' ? get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getAddress())) : get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getAddressAr()))}}
                                </p>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->

                        <!-- Contact Info Item Start -->
                        <div class="contact-info--Item">
                            <div class="title">
                                <h3 class="h4"><i class="mr--10 fa fa-envelope-o"></i>{{ __('site.E-mail :') }}</h3>
                            </div>

                            <div class="content fs--14 text-darker mt--4">
                                <p><a href="mailto:{{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getEmail())) }}" class="btn-link">
                                        {{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getEmail())) }}
                                    </a></p>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->

                        <!-- Contact Info Item Start -->
                        <div class="contact-info--Item">
                            <div class="title">
                                <h3 class="h4"><i class="mr--10 fa fa-phone"></i>{{ __('site.Telephone :') }}</h3>
                            </div>

                            <div class="content fs--14 text-darker mt--4">
                                <p><a href="tel:{{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getTelephone())) }}" class="btn-link">
                                        {{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getTelephone())) }}
                                    </a></p>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->
                    </div>
                    <!-- Contact Info Items End -->
                </div>

                <div class="col-md-9 pb--60">
                    <!-- Contact Form Start -->
                    <div class="contact--form">
                        <div class="contact--title">
                            <h3 class="h4">{{ __('site.Drop Us A Line') }}</h3>
                        </div>

                        <div class="contact--subtitle pt--15">
                            <h4 class="h6 fw--400 text-darkest">{{ __('site.Don’t worry ! your e-mail address will not published.') }}</h4>
                        </div>

                        <div class="contact--notes ff--primary mt--2">
                            <p>{{ __('site.(Required field are marked *)') }}</p>
                        </div>

                        <form action="{{ route('Frontend.Frontend.contactUs') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row gutter--20">
                                <div class="col-xs-6 col-xxs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('site.Name *') }}" class="form-control" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-6 col-xxs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('site.E-mail *') }}" class="form-control" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" value="{{ old('subject') }}" placeholder="{{ __('site.Subject *') }}" class="form-control" required>
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <textarea name="message" placeholder="{{ __('site.Message *') }}" class="form-control" required>
                                            {{ old('message') }}
                                        </textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary mt--10">{{ __('site.Send Message') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->
