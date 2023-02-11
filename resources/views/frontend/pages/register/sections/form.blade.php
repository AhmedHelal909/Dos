 <!-- Contact Section Start -->
 <div class="contact--section pt--80 pb--20">
    <div class="container">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 pb--60">
                <!-- Contact Form Start -->
                <div class="contact--form">
{{--                <div class="contact--form" data-form="ajax">--}}
                    <div class="contact--title">
                        <h3 class="h4">{{ __('site.Create New Account Here') }}</h3>
                    </div>

                    <form action="{{ route('Frontend.register.store') }}" method="post">
                        @csrf
                        <div class="row gutter--20">
                            <div class="col-xs-12 col-xxs-12">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="{{ __('site.Name *') }}" class="form-control" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-xxs-12">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="{{ __('site.E-mail *')}}" class="form-control" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-xxs-12">
                                <div class="form-group">
                                    <input type="number" name="phone" placeholder="{{ __('site.phone *')}}" class="form-control" required>
                                    @error('phone')
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
                            <div class="col-xs-12 col-xxs-12">
                                <div class="form-group">
                                    <input type="password" name="confirmPassword" placeholder="{{ __('site.Confirm password') }}" class="form-control" required>
                                    @error('confirmPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-xxs-12">
                                <div class="form-group">
                                    <a href="">{{ __('site.Already have an account?') }}</a>
                                </div>
                            </div>


                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary mt--10">{{ __('site.Register') }}</button>
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
