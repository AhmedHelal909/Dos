@extends('dashboard.layouts.app')

@section('title', __('site.pharmacies'))



@section('content')
    <div class="d-flex justify-content-between">
        <h4 class="text-uppercase" style="text-align: start; padding:10px !important;">@lang('site.pharmacies')</h4>

        <a href="" class="btn btn-primary mt-2"><i class="fa fa-plus"></i>
            {{ __('site.add') }}
        </a>
    </div>

    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('site.name') }}</th>
                        <th>{{ __('site.email') }}</th>
                        <th>{{ __('site.phone') }}</th>
                        <th>{{ __('site.image') }}</th>
                        {{--                        <th>{{ __('site.action') }}</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($pharmacies as $pharmacy)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pharmacy->name }}</td>
                            <td>{{ $pharmacy->email }}</td>
                            <td>{{ $pharmacy->phone }}</td>
                            <td>{{ $pharmacy->image }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">@lang('site.no_data_found')</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $pharmacies->appends(request()->query())->links() }}
            </div>
        </div>
@endsection


{{--@push('style')--}}
{{--    @include('dashboard.utilities._style_datatable')--}}
{{--@endpush--}}

{{--@push('script')--}}
{{--    @include('dashboard.utilities._script_datatable')--}}
{{--@endpush--}}


