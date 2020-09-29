@include('dashboard::errors')


<select2
    name="custom_field_id"
    label="@lang('custom_fields::custom_fields.singular')"
    placeholder="@lang('custom_fields::custom_fields.select')"
    remote-url="{{ route('custom_fields.select') }}"
    value="{{ $orderProductFieldValue->custom_field_id ?? old('custom_field_id') }}"
></select2>

<select2
    name="option_id"
    label="@lang('custom_field_options::custom_field_options.singular')"
    placeholder="@lang('custom_field_options::custom_field_options.select')"
    remote-url="{{ route('custom_field_options.select') }}"
    value="{{ $orderProductFieldValue->option_id ?? old('option_id') }}"
></select2>

{{ BsForm::text('value') }}
{{ BsForm::text('additional_price') }}


