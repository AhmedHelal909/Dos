<div class="form-group {{ $detail['cssClass'] }}">
    <label for="Input{{ $colname }}">@lang('site.' . $colname)</label>
    <select class="form-control form-select form-select-sm js-example-basic-multiple" {{ $detail['attr'] }}
        aria-label="form-select-sm example" style="padding: 0.3rem .75rem" name="{{ $colname }}[]" >
        <option value="" {{  isset($row) ? ( in_array(null,$row->$colname) ? "selected": "") : "" }}>{{__('site.select')}}  {{__('site.all')}}</option>   
      
        @foreach ($detail['data'] as $id => $val)
        <option value="{{ $id }}"
            {{ (isset($row) && in_array($id,$row->$colname)) ? 'selected' : '' }}>
            {{ $val }}
        </option>
    @endforeach
    </select>
    @error($colname)
        <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
    @enderror
  
  </div>
  