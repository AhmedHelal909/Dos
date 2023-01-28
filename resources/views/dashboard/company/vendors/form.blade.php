@php
    $dataColumns = [
        'name' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'phone' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => '','placeholder'=>__('site.description')],
        'email' => ['type' => 'email', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'password' => ['type' => 'password', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'password_confirmation' => ['type' => 'password', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'note' => ['type' => 'textarea', 'cssClass' => 'col-md-12', 'attr' => '', 'data' => '','placeholder'=>__('site.description')],
        'image' => ['type' => 'image', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => '','path' => 'vendors'],

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
