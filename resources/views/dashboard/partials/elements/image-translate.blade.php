@foreach (config('laravellocalization.supportedLocales') as $locale => $index)
    <div class="form-group {{ $detail['cssClass'] }}">
        <label for="Input{{ $colname }}">@lang('site.' . $colname) {{ $locale }}</label>
        <input type="file" name="{{ $colname }}[{{ $locale }}]"
               class="form-control  @error($locale . '.' . $colname) parsley-error @enderror" id="Input{{ $colname }}"
               placeholder="@lang('site.enter') @lang('site.' . $colname) @lang('site.' . $locale)"
               value="{{ isset($row)
                ? (isset($row->getTranslations($colname)[$locale])
                    ? $row->getTranslations($colname)[$locale]
                    : '')
                : old($locale . '.' . $colname) }}"/>
        @error($locale . '.' . $colname)
        <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>

    <div class="form-group {{ $detail['cssClass'] }}">
        <img
            src="{{ isset($row) ? ($row->getTranslations($colname)[$locale] != null ?
 asset('uploads/'.$detail['path'].'/' . $row->getTranslations($colname)[$locale]) : asset('uploads/'.$detail['path'].'/logo-en.png') ) :
 asset('uploads/'.$detail['path'].'/logo-en.png') }}"
            style="width: 115px;height: 80px;position: relative;
                top: 14px;"
            class="img-thumbnail image-preview2">
    </div>

@endforeach

@push('script')
    <script>
        $("#Input{{ $colname }}").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endpush
