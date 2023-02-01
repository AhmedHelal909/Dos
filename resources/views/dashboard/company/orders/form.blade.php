@php
    $dataColumns = [
        'name' => ['type' => 'text', 'cssClass' => 'col-md-6', 'placeholder' => 'test', 'attr' => '', 'data' => ''],
        'phone' => ['type' => 'text', 'cssClass' => 'col-md-6','placeholder' => 'test',  'attr' => '', 'data' => ''],
        'address' => ['type' => 'textarea', 'cssClass' => 'col-md-12', 'placeholder' => 'test', 'attr' => '', 'data' => ''],
        'medical_number' => ['type' => 'number', 'cssClass' => 'col-md-6', 'placeholder' => 'test', 'attr' => '', 'data' => ''],
        'id_number' => ['type' => 'number', 'cssClass' => 'col-md-6', 'placeholder' => 'test', 'attr' => '', 'data' => ''],
//        'status' => ['type' => 'select', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
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
