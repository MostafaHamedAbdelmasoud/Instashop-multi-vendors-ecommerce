@include('dashboard::errors')



{{ BsForm::radio($name='model_type' ,$value = 'shipping_company' ,$checked = true )->label(__('subscriptions::subscriptions.additions.shipping_company') )}}

<select2
    name="model_id"
    label="@lang('accounts::shipping_companies.singular')"
    placeholder="@lang('accounts::shipping_companies.select')"
    remote-url="{{ route('shipping_companies.select') }}"
    value="{{ $subscription->model_id ?? old('model_id') }}"
></select2>


{{ BsForm::date('start_at')}}
{{ BsForm::date('end_at')}}
{{ BsForm::text('paid_amount')}}

@push('scripts')
    <script>
        // $("#model_type").change(function () {
        //     var selectedCountry = $(this).children("option:selected").val();
        //     if (selectedCountry == 0) {
        //         $('.select_shipping_company').hide();
        //         $('.select_store').show();
        //     } else {
        //         $('.select_store').hide();
        //         $('.select_shipping_company').show();
        //     }
        // })
    </script>
@endpush
