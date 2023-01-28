{{-- @if (auth()->user()->isAbleTo('read-'.$module_name_plural)) --}}
@if (auth(get_guard())->user()->hasPermissionTo('update-'.$module_name_plural,get_guard()))
<a href="{{route('dashboard.'.$module_name_plural.'.edit', $row)}}" rel="tooltip" title="" class="btn btn-success waves-effect waves-light btn-sm"
    data-original-title="@lang('site.edit') @lang('site.'.$module_name_singular)">
    <div class="font-15 text-white">
        <i class="fa fa-edit"></i>
    </div>
</a>

@else
<button rel="tooltip" title="" class="btn btn-success waves-effect waves-light btn-sm" disabled style="  cursor: not-allowed;
pointer-events: all !important;"
    data-original-title="@lang('site.edit') @lang('site.'.$module_name_singular)">
    <div class="font-15 text-white" >
        <i class="fa fa-edit"></i>
    </div>
</button>


@endif 
