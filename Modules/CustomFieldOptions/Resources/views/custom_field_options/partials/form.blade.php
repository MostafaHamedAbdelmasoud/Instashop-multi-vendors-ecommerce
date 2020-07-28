@include('dashboard::errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs


<select2
    name="category_id"
    label="@lang('categories::categories.singular')"
    placeholder="@lang('categories::categories.select')"
    remote-url="{{ route('categories.select') }}"
    value="{{ $customField->category_id ?? old('category_id') }}"
></select2>

<select2
    name="store_id"
    label="@lang('stores::stores.singular')"
    placeholder="@lang('stores::stores.select')"
    remote-url="{{ route('stores.select') }}"
    value="{{ $customField->store_id ?? old('store_id') }}"
></select2>

{{ BsForm::text('type') }}


