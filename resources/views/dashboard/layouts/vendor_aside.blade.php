@havePermission('read-orders', 'pharmacy')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-hourglass-half"></i> <span> {{ __('site.orders') }}
            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.orders.index') }}">{{ __('site.index') }}</a></li>
    </ul>
</li>
@endhavePermission
