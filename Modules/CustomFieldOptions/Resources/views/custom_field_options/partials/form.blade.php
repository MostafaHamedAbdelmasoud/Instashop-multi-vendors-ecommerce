@include('dashboard::errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs


<select2
    name="product_id"
    label="@lang('products::products.singular')"
    placeholder="@lang('products::products.select')"
    remote-url="{{ route('products.select') }}"
    value="{{ $customField->product_id ?? old('product_id') }}"
></select2>

<select2
    name="custom_field_id"
    label="@lang('custom_fields::custom_fields.singular')"
    placeholder="@lang('custom_fields::custom_fields.select')"
    remote-url="{{ route('custom_fields.select') }}"
    value="{{ $customField->custom_field_id ?? old('custom_field_id') }}"
></select2>

{{ BsForm::text('additional_price') }}


