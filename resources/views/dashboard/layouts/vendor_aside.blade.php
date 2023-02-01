@havePermission('read-roles', 'pharmacy')
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-hourglass-half"></i> <span> {{ __('site.roles') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled" style="display: none;">
            <li><a href="{{ route('dashboard.roles.index') }}">{{ __('site.index') }}</a></li>
            @havePermission('create-roles', 'vendor')
                <li><a href="{{ route('dashboard.roles.create') }}">{{ __('site.role.add') }}</a></li>
            @endhavePermission
        </ul>
    </li>
@endhavePermission
{{-- @havePermission('read-roles','vendor')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-hourglass-half"></i> <span> {{__('site.vendor')}} </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{route('dashboard.roles.index',["type"=>'vendor'])}}">{{__('site.index')}}</a></li>
        @havePermission('create-roles','vendor')
        <li><a href="{{route('dashboard.roles.create',["type"=>'vendor'])}}">{{__('site.role.add')}}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission --}}

@havePermission('read-pharmacies', 'pharmacy')
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> {{ __('site.vendors') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled" style="display: none;">
            <li><a href="{{ route('dashboard.vendors.index') }}">{{ __('site.index') }}</a></li>
            @havePermission('create-pharmacy', 'pharmacy')
                <li><a href="{{ route('dashboard.vendors.create') }}">{{ __('site.vendor.add') }}</a></li>
            @endhavePermission
        </ul>
    </li>
@endhavePermission


