@php
    $dataColumns = [
        'name' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'ssn' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'email' => ['type' => 'email', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'password' => ['type' => 'password', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'password_confirmation' => ['type' => 'password', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'motor_number' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'license' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'image' => ['type' => 'image', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => '', 'path' => 'deliveries'],
   

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
