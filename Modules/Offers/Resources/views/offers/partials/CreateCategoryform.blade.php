@include('dashboard::errors')



@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs


<select2
    name="model_id"
    label="@lang('categories::categories.singular')"
    placeholder="@lang('categories::categories.select')"
    remote-url="{{ route('categories.select') }}"
    value="{{ $offer->model_id ?? old('model_id') }}"
></select2>

{{ BsForm::text('fixed_discount_price') }}
{{ BsForm::text('percentage_discount_price') }}
{{ BsForm::date('expire_at') }}


