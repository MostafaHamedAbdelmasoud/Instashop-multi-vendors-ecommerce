@include('dashboard::errors')

{{ BsForm::radio($name='model_type' ,$value = 'store' ,$checked = true )->label(__('subscriptions::subscriptions.additions.store') )}}

<select2
    name="model_id"
    label="@lang('stores::stores.singular')"
    placeholder="@lang('stores::stores.select')"
    remote-url="{{ route('stores.select') }}"
    value="{{ $subscription->model_id ?? old('model_id') }}"
></select2>


{{ BsForm::date('start_at')}}
{{ BsForm::date('end_at')}}
{{ BsForm::text('paid_amount')}}
