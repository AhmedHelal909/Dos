@havePermission('read-users', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-building"></i>
        <span> {{ __('site.users') }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.users.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-users', 'web')
        <li><a href="{{ route('dashboard.users.create') }}">{{ __('site.user.add') }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission

@havePermission('read-sliders', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-building"></i>
        <span> {{ __('site.sliders') }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.sliders.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-sliders', 'web')
        <li><a href="{{ route('dashboard.sliders.create') }}">{{ __('site.sliders.add') }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission

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

@havePermission('read-orders', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-hourglass-half"></i> <span> {{ __('site.orders') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.orders.index') }}">{{ __('site.index') }}</a></li>
    </ul>
</li>
@endhavePermission

@havePermission('read-pharmacies', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> {{ __('site.pharmacies') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.pharmacies.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-pharmacies', 'web')
        <li><a href="{{ route('dashboard.pharmacies.create') }}">{{ __('site.add') }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission


@havePermission('read-settings', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"> <i class="ti-settings"></i><span> {{ __('site.settings') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.settings.index') }}">{{ __('site.index') }}</a></li>
    </ul>
</li>
@endhavePermission

@havePermission('read-ourteams', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> {{ __('site.our_team') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.ourteams.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-ourteams', 'web')
        <li><a href="{{ route('dashboard.ourteams.create') }}">{{ __('site.add') }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission

@havePermission('read-ourhistories', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> {{ __('site.ourhistories') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.ourhistories.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-ourhistories', 'web')
        <li><a href="{{ route('dashboard.ourhistories.create') }}">{{ __('site.add') }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission

@havePermission('read-contacts', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"> <i class="ti-settings"></i><span> {{ __('site.contacts') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.contacts.index') }}">{{ __('site.index') }}</a></li>
    </ul>
</li>
@endhavePermission

