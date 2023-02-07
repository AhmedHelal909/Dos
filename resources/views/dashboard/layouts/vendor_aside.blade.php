@havePermission('read-roles', 'pharmacy')
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-hourglass-half"></i> <span> {{ __('site.roles') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled" style="display: none;">
            <li><a href="{{ route('dashboard.roles.index') }}">{{ __('site.index') }}</a></li>
            @havePermission('create-roles', 'pharmacy')
                <li><a href="{{ route('dashboard.roles.create') }}">{{ __('site.role.add') }}</a></li>
            @endhavePermission
        </ul>
    </li>
@endhavePermission

{{--@havePermission('read-orders', 'pharmacy')--}}
@havePermission('read-pharmacies', 'pharmacy')
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> {{ __('site.pharmacies') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled" style="display: none;">
            <li><a href="{{ route('dashboard.pharmacies.index') }}">{{ __('site.index') }}</a></li>
            @havePermission('create-pharmacies', 'pharmacy')
                <li><a href="{{ route('dashboard.pharmacies.create') }}">{{ __('site.add') }}</a></li>
            @endhavePermission
        </ul>
    </li>
@endhavePermission
@if(auth()->guard('pharmacy'))
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-hourglass-half"></i> <span> {{ __('site.orders') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.orders.index') }}">{{ __('site.index') }}</a></li>
    </ul>
</li>
@endif
{{--@endhavePermission--}}
