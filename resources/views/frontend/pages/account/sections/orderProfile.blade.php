  <!-- Page Wrapper Start -->
  <section class="page--wrapper pt--80 pb--20">
    <div class="container">
        <div class="row">
            <!-- Main Content Start -->
            <div class="main--content col-md-8 pb--60" data-trigger="stickyScroll">
                <div class="main--content-inner drop--shadow">
                    <!-- Content Nav Start -->
                    <div class="content--nav pb--30">
                        <ul class="nav ff--primary fs--14 fw--500 bg-lighter">
                            <li class="active"><a href="#">{{ __('site.All Orders') }}</a></li>
                            <li><a href="#">{{ __('site.Pending Orders') }}</a></li>
                            <li><a href="#">{{ __('site.Completed Orders') }}</a></li>
                            <li><a href="#"> {{ __('site.Canceled Orders') }}</a></li>
                        </ul>
                    </div>
                    <!-- Content Nav End -->


                    <!-- Topics List Start -->
                    <div class="topics--list">
                        <table class="table">
                            <thead class="ff--primary fs--14 text-darkest">
                                <tr>
                                    <th>{{ __('site.orders') }}</th>
                                    <th>{{ __('site.action') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                            @forelse($orders as $order)
                                <tr class="pinned">
                                    <td>
                                        <p>{{ __('site.Order Number') }} : {{ $order->id ?? '' }}</p>
                                    </td>
                                    <td>
                                        <a href="#" class="oreder-action">
                                            <i class="text-primary fa fa-pencil"></i>
                                        </a>
                                        <a href="#" class="oreder-action">
                                            <i class="text-primary fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">
                                        <p class="text-center">{{ __('site.No Orders') }}</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Topics List End -->
                </div>
            </div>
            <!-- Main Content End -->
            <!-- Main Sidebar Start -->
            <div class="main--sidebar col-md-4 pb--60" data-trigger="stickyScroll">
                <!-- Widget Start -->
                <div class="widget">
                    <h2 class="h4 fw--700 widget--title">{{ __('site.Edit Profile') }}</h2>

                    <!-- Buddy Finder Widget Start -->
                    <div class="buddy-finder--widget">
                        <form action="{{ route('Frontend.updateProfile') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-xxs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" value="{{ auth()->guard('customer_web')->user()->name }}" placeholder="{{ __('site.Name') }}" class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-xxs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ auth()->guard('customer_web')->user()->email }}" placeholder="{{ __('site.Email') }}" class="form-control">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-xxs-12">
                                    <div class="form-group">
                                        <input type="phone" name="phone" value="{{ auth()->guard('customer_web')->user()->phone }}" placeholder="{{ __('site.phone') }}" class="form-control">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-xxs-12">
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="{{ __('site.Password') }}" class="form-control">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-xxs-12">
                                    <div class="form-group">
                                        <input type="password" name="confirmPassword" placeholder="{{ __('site.Confirm Password') }}" class="form-control">
                                        @error('confirmPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary">{{ __('site.Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Buddy Finder Widget End -->
                </div>
                <!-- Widget End -->
            </div>
            <!-- Main Sidebar End -->

        </div>
    </div>
</section>
<!-- Page Wrapper End -->
