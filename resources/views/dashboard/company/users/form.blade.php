@php
    $dataColumns = [
        'name' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'address' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '','placeholder' => __('site.address'), 'data' => ''],
        'email' => ['type' => 'email', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'phone' => ['type' => 'number', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'age' => ['type' => 'number', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'image' => ['type' => 'image', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => '','path' => 'users'],
        'password' => ['type' => 'password', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'password_confirmation' => ['type' => 'password', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],


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
