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
                        <a href="index.html">
                            <img src="{{asset('frontEnd/img/logo-white.png')}}" class="normal" alt="">
                            <img src="{{asset('frontEnd/img/logo-black.png')}}" class="sticky" alt="">
                        </a>
                    </div>
                    <!-- Header Navbar Logo End -->
                </div>

                <div id="headerNav" class="navbar-collapse collapse float--right">
                    <!-- Header Nav Links Start -->
                    <ul class="header--nav-links style--1 nav ff--primary">
                        
                        <li class="active">
                            <a href="index.html">
                                <span>Home</span>
                            </a>
                        </li>
                        <li><a href="about.html"><span>About Us</span></a></li>
                        
                        
                        <li><a href="contact.html"><span>Contact</span></a></li>
                        <li class="dropdown">
                            <a href="account.html" class="dropdown-toggle" data-toggle="dropdown">
                                <span>Account</span>
                                <i class="fa fa-caret-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="account.html"><span>My Account</span></a></li>
                                <li><a href="login.html"><span>Login</span></a></li>
                                <li><a href="register.html"><span>Register</span></a></li>

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