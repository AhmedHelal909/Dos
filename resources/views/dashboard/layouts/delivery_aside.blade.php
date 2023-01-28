@havePermission('read-orders', 'delivery')
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"> <i class="ti-shopping-cart"></i><span>
                {{ __('site.orders') }} </span> <span class="menu-arrow float-right"><i
                    class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled" style="display: none;">
            <li>
                {{-- @foreach (App\Enum\OrderEnum::getList() as $key => $order)
                    <a href="{{ route('dashboard.orders.index', ['status' => $key]) }}">{{ $order }}

                        <span
                            class="{{ App\Enum\ColorEnum::getValue($key) }}  badge-pill float-right">{{ countOrder($key) }}</span>
                    </a>
            </li>
            @endforeach --}}
            <a href="{{ route('dashboard.orders.index') }}">{{ __('site.all') }}</a>
    </li>
    </ul>
    </li>
@endhavePermission
