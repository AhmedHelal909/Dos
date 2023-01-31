@extends('dashboard.layouts.app')

@section('title', __('site.orders'))



@section('content')
    <h4 class="text-uppercase" style="text-align: start; padding:10px !important;">@lang('site.orders')</h4>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('site.name') }}</th>
                        <th>{{ __('site.phone') }}</th>
                        <th>{{ __('site.address') }}</th>
                        <th>{{ __('site.id_number') }}</th>
                        <th>{{ __('site.medical_number') }}</th>
                        <th>{{ __('site.status') }}</th>
{{--                        <th>{{ __('site.action') }}</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->id_number }}</td>
                            <td>{{ $order->medical_number }}</td>
                            <td>{{ $order->status }}</td>
{{--                            <td>--}}
{{--                                <a href="{{ route('dashboard.orders.show', $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> @lang('site.show')</a>--}}
{{--                            </td>--}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">@lang('site.no_data_found')</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                 {{ $orders->links() }}

            </div>
        </div>
@endsection


{{--@push('style')--}}
{{--    @include('dashboard.utilities._style_datatable')--}}
{{--@endpush--}}

{{--@push('script')--}}
{{--    @include('dashboard.utilities._script_datatable')--}}
{{--@endpush--}}


