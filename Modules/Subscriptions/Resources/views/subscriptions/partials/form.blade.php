@include('dashboard::errors')


{{ BsForm::select($name='model_type', $options=['متجر','شركة شحن'] , $value='model_type') }}


<select2
    class="select_store"
    name="model_id"
    label="@lang('stores::stores.singular')"
    placeholder="@lang('stores::stores.select')"
    remote-url="{{ route('stores.select') }}"
    value="{{ $subscription->model_id ?? old('model_id') }}"
></select2>


{{ BsForm::date('start_at')}}
{{ BsForm::date('end_at')}}
{{ BsForm::text('paid_amount')}}

@push('scripts')
    <script>
        $("#model_type").change(function () {
            var selectedCountry = $(this).children("option:selected").val();
            if (selectedCountry == 0) {
                $('.select_store').show();
                $('.select_shipping_company').hide();
            } else {
                $('.select_shipping_company').show();
                $('.select_store').hide();
            }
        })
    </script>
@endpush
