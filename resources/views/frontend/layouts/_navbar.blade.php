    <!-- Header Section Start -->
    <header class="header--section style--1">
            
        <!-- Header Navbar Start -->
        <div class="header--navbar navbar bg-black" data-trigger="sticky">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle style--1 collapsed" data-toggle="collapse" data-target="#headerNav">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Header Navbar Logo Start -->
                    <div class="header--navbar-logo navbar-brand">
                        <a href="{{route('Frontend.Frontend.home')}}">
                            <img src="{{asset('frontEnd/img/logo-white.png')}}" class="normal" alt="">
                            <img src="{{asset('frontEnd/img/logo-black.png')}}" class="sticky" alt="">
                        </a>
                    </div>
                    <!-- Header Navbar Logo End -->
                </div>

                <div id="headerNav" class="navbar-collapse collapse float--right">
                    <!-- Header Nav Links Start -->
                    <ul class="header--nav-links style--1 nav ff--primary">
                        
                        <li class="{{Route::is('Frontend.Frontend.home') ? 'active' : ''}}">
                            <a href="{{route('Frontend.Frontend.home')}}">
                                <span>{{__('site.Home')}}</span>
                            </a>
                        </li>
                        <li class="{{Route::is('Frontend.Frontend.about') ? 'active' : ''}}">
                            <a href="{{route('Frontend.Frontend.about')}}"><span>{{__('site.about')}}</span></a>
                        </li>
                        
                        
                        <li class="{{Route::is('Frontend.Frontend.contact') ? 'active' : ''}}"><a href="{{route('Frontend.Frontend.contact')}}"><span>{{__('site.contact us')}}</span></a></li>
                        <li class="dropdown">
                            <a href="{{route('Frontend.Frontend.account')}}" class="dropdown-toggle" data-toggle="dropdown">
                                <span>{{__('site.account')}}</span>
                                <i class="fa fa-caret-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="{{route('Frontend.Frontend.account')}}"><span>{{__('site.my_account')}}</span></a></li>
                                <li><a href="{{route('Frontend.login')}}"><span>{{__('site.login')}}</span></a></li>
                                <li><a href="{{route('Frontend.register')}}"><span>{{__('site.Register')}}</span></a></li>

                            </ul>
                        </li>
                        <li> @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if( app()->getLocale() != $localeCode)

                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}" >
                                <p class="notify-details"><b>{{ $properties['native'] }}</b></p>
                            </a>
                            @endif
                            @endforeach</li>
                            <li>
                    </ul>
                    <!-- Header Nav Links End -->
                </div>
            </div>
        </div>
        <!-- Header Navbar End -->
    </header>
    <!-- Header Section End -->