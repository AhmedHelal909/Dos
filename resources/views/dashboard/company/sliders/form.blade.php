@php
    $dataColumns = [
        'title' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'link' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'image' => ['type' => 'image', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => '','path' => 'sliders'],
        'description' => ['type' => 'textarea', 'placeholder' => 'Description', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
//        'status' => ['type' => 'select', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => '[1,0]','options' => ['1' => 'Active', '0' => 'Inactive']],
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
