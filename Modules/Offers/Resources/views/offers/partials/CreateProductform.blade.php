@include('dashboard::errors')



@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs

<select2
    name="model_id"
    label="@lang('products::products.singular')"
    placeholder="@lang('products::products.select')"
    remote-url="{{ route('products.select') }}"
    value="{{ $offer->model_id ?? old('model_id') }}"
></select2>


{{ BsForm::text('fixed_discount_price') }}
{{ BsForm::text('percentage_discount_price') }}
{{ BsForm::date('expire_at') }}


