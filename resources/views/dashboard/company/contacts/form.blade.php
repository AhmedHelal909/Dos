@php
    $dataColumns = [
        'address' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'phone' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'email' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'sec_phone' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'about_us' => ['type' => 'textarea', 'cssClass' => 'col-md-12', 'attr' => '', 'data' => '', 'placeholder' => 'About Us'],

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
