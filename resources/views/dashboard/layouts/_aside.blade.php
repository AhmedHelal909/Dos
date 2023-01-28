    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
            <i class="mdi mdi-close"></i>
        </button>

        <div class="left-side-logo d-block d-lg-none">
            <div class="text-center">

                <a href="index.html" class="logo"><img src="{{asset('assets/images/logo_dark.png')}}" height="20" alt="logo"></a>
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">

            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="" class="waves-effect">
                            <i class="dripicons-home"></i>
                            <span> {{__('site.dashboard')}} <span class="badge badge-success badge-pill float-right">3</span></span>
                        </a>
                    </li>
                   @if (Auth::guard('vendor')->user())
                       @include('dashboard.layouts.vendor_aside');
                   @elseif(Auth::guard('web')->user())
                       @include('dashboard.layouts.company_aside');
                   @elseif(Auth::guard('delivery')->user())
                   @include('dashboard.layouts.delivery_aside');
                   @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
    </div>
    <!-- Left Sidebar End -->
