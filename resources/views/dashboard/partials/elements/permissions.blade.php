@php
    $models = config('permissions.vendors');
    $maps = ['create', 'read', 'update', 'delete'];
@endphp
<div class="row">
    <div class="col-md-12" style="padding-left: 30px !important;padding-right: 30px !important;">

        <input type="checkbox"   id="check_all" data-bool="0" />
        <label for="check_all">@lang('site.check_all')</label>
    </div>
</div>
<div class="row">

    @foreach ($models as $index => $model)
        <div class="list-group {{ $detail['cssClass'] }}"
            style="padding-left: 30px !important;padding-right: 30px !important;">
            <label class="list-group-item active" style="padding: 0.75rem 0.25rem !important;">
                <input type="checkbox" class="check_all" id="{{ $index }}" />
                @lang('site.' . $model)
            </label>
            <br>
            @foreach ($maps as $map)
                <label>
                    <input type="checkbox" name="permissions[]" class="{{ $index }}"
                        {{ isset($row) && $row->hasPermissionTo($map . '-' . $model) ? 'checked' : '' }}
                        value="{{ $map . '-' . $model }}"> @lang('site.' . $map)</label>
                <hr style="width: 100% !important">
            @endforeach
        </div>
    @endforeach
</div>
@if (auth('web')->user())
    <div class="form-group col-md-12">
        <label for="Input">@lang('site.type')</label>
        <select class="form-control form-select form-select-sm @error('guard_name') parsley-error @enderror"
            aria-label=".form-select-sm example" style="padding: 0.3rem .75rem" name="guard_name">
            <option value="web"
                {{ (isset($row) && $row->guard_name == 'web') || old('guard_name') == 'web' ? 'selected' : '' }}>
                {{__('site.web')}}
            </option>
            <option value="vendor"
                {{ (isset($row) && $row->guard_name == 'vendor') || old('guard_name') == 'vendor' ? 'selected' : '' }}>
                {{__('site.vendor')}}
            </option>
        </select>
        @error($colname)
            <ul class="parsley-errors-list filled" id="parsley-id-5">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror

    </div>
@endif
@push('script')
    <script>
        function checksAll()
        {
            var arr = $('.check_all').length;
            var arr2 = $('.check_all:checked').length;
                if(arr == arr2 )
                {
                    $('#check_all').prop('checked',true);
    
                }else {
                    $('#check_all').prop('checked',false);
    
                }
        
        }
        $('.check_all').on('change', function() {

                if ($(this).is(":checked")) {
    
                    var id = $(this).attr('id');
                    $.each($(`.${id}`).not($(this)), function() {
                        $(this).prop('checked', true);
                    })
                    
                } else {
                    var id = $(this).attr('id');
                    $.each($(`.${id}`).not($(this)), function() {
                        $(this).prop('checked', false);
                    })
                    $('#check_all').prop('checked',false);
    
                }
                checksAll();

            
            
            // checksAll()
            //   .each() prop('checked', this.checked);
        });
        var count = 0;
        $.each($('.check_all'), function() {
            var id = $(this).attr('id');
            $.each($(`.${id}`).not($(this)), function() {
                if ($(this).is(":checked")) {
                    ++count;

                }
            })
            if (count == 4) {
                $(this).prop('checked', true);
            }
            count = 0;
        })
        $("input[name='permissions[]']").on('change',function(){

          
            var id = $(this).attr('class');
            $.each($(`.${id}`).not($('.check_all')),function(){
                if($(this).is(':checked')){
                    ++count;
                }
                if(count == 4)
                {
                    $(`#${id}`).prop('checked',true);

                }else{
                    $(`#${id}`).prop('checked',false);
                $('#check_all').prop('checked',false);


                }
                
            })
            checksAll();
            count = 0;

        
        })
    
        $('#check_all').on('change',function(){
            if ($(this).is(":checked")) {
                
                $('input[type="checkbox"]').prop('checked',true);
            }else {
                
                $('input[type="checkbox"]').prop('checked',false);
                
            }

              
        })
        checksAll();
        
    </script>
@endpush
