@php
    $dataColumns = [
        'content' => ['type' => 'textarea-translate', 'placeholder' => 'Description', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'date' => ['type' => 'date', 'placeholder' => 'Date', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
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
