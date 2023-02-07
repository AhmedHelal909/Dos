@if (auth(get_guard())->user()->hasPermissionTo('update-'.$module_name_plural,get_guard()))
<button type="button" class="btn btn-info px-2 radius-30 btn-sm" id="{{ $row->id }}" data-toggle="modal" data-target="#modal" data-id="{{ $row->id }}"><i class="far fa-eye"></i></button>
@endif

<!-- create model and loop pharmacies in select -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('dashboard.orders.assign') }}" method="post">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">{{ __('site.assign_pharmacy') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input name="order_id" id="order_id" type="hidden" value="">
                    <label for="pharmacy_id">{{ __('site.pharmacies') }}</label>
                    <select required name="pharmacy_id[]" id="pharmacy_id" class="form-control">
                        <option value="">{{ __('site.select_pharmacy') }}</option>
                        @foreach($pharmacies as $pharmacy)
                            <option value="{{ $pharmacy->id }}">{{ $pharmacy->name }}</option>
                        @endforeach
                    </select>
                    @error('pharmacy_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('site.colse') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('site.save_changes') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- js -->
<script>
    $('#modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var order_id = button.data('id') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-body #order_id').val(order_id)
        console.log($('#order_id').val(), 'order_id')
    })
</script>
