   <!-- Contact Section Start -->
   <div class="contact--section pt--80 pb--20">
    <div class="container">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 pb--60">
                <!-- Contact Form Start -->
                <div class="contact--form">
                    <div class="contact--title">
                        <h3 class="h4">{{ __('site.Login Here') }}</h3>
                    </div>

                    <form action="{{ route('Frontend.login.store') }}" method="post">
                        @csrf
                        <div class="row gutter--20">

                            <div class="col-xs-12 col-xxs-12">
                                <div class="form-group">
                                    <input type="text" name="email_phone" placeholder="{{ __('site.Email-phone') }}" class="form-control" required>
                                    @error('email_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-xxs-12">
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="{{ __('site.Password') }}" class="form-control" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-xxs-12">
                                <div class="form-group">
                                    <a href="{{ route('Frontend.register') }}" >{{ __('site.Create New Account.') }}</a>
                                </div>
                            </div>
                            <div class="col-xs-6 col-xxs-12">
                                <div class="form-group">
{{--                                    <a href="#" >{{ __('site.Forget Password?') }}</a>--}}
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary mt--10">{{ __('site.Login') }}</button>
                            </div>
                        </div>

                        <div class="status"></div>
                    </form>
                </div>
                <!-- Contact Form End -->
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
<!-- Contact Section End -->
