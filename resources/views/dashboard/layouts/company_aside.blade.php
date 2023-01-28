@havePermission('read-roles', 'web')
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-hourglass-half"></i> <span> {{ __('site.roles') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled" style="display: none;">
            <li><a href="{{ route('dashboard.roles.index') }}">{{ __('site.index') }}</a></li>
            @havePermission('create-roles', 'web')
                <li><a href="{{ route('dashboard.roles.create') }}">{{ __('site.role.add') }}</a></li>
            @endhavePermission
        </ul>
    </li>
@endhavePermission
{{-- @havePermission('read-roles','web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-hourglass-half"></i> <span> {{__('site.vendor')}} </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{route('dashboard.roles.index',["type"=>'vendor'])}}">{{__('site.index')}}</a></li>
        @havePermission('create-roles','web')
        <li><a href="{{route('dashboard.roles.create',["type"=>'vendor'])}}">{{__('site.role.add')}}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission --}}
@havePermission('read-users', 'web')
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-building"></i> <span> {{ __('site.users') }} </span>
            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled" style="display: none;">
            <li><a href="{{ route('dashboard.users.index') }}">{{ __('site.index') }}</a></li>
            @havePermission('create-users', 'web')
                <li><a href="{{ route('dashboard.users.create') }}">{{ __('site.user.add') }}</a></li>
            @endhavePermission
        </ul>
    </li>
@endhavePermission
@havePermission('read-vendors', 'web')
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> {{ __('site.vendors') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled" style="display: none;">
            <li><a href="{{ route('dashboard.vendors.index') }}">{{ __('site.index') }}</a></li>
            @havePermission('create-vendors', 'web')
                <li><a href="{{ route('dashboard.vendors.create') }}">{{ __('site.vendor.add') }}</a></li>
            @endhavePermission
        </ul>
    </li>
@endhavePermission

@havePermission('read-deliveries', 'web')
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-taxi"></i> <span> {{ __('site.deliveries') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled" style="display: none;">
            <li><a href="{{ route('dashboard.deliveries.index') }}">{{ __('site.index') }}</a></li>
            @havePermission('create-deliveries', 'web')
                <li><a href="{{ route('dashboard.deliveries.create') }}">{{ __('site.delivery.add') }}</a></li>
            @endhavePermission
        </ul>
    </li>
@endhavePermission

