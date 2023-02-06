@php
    $dataColumns = [
        'title' => ['type' => 'text-translate', 'cssClass' => 'col-md-4', 'attr' => '', 'data' => ''],
        'link' => ['type' => 'text', 'cssClass' => 'col-md-4', 'attr' => '', 'data' => ''],
       'description' => ['type' => 'textarea-translate', 'placeholder' => 'Description', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'image' => ['type' => 'image-translate', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => '','path' => 'sliders'],
    ];
@endphp

<div class="card-body">
    <div class="row">
        @foreach ($dataColumns as $colname => $detail)
            @include('dashboard.partials.elements.' . $detail['type'])
        @endforeach
    </div>

</div>



@push('script')
@endpush
