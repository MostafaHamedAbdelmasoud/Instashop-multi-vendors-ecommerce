@include('dashboard::errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs

<select2
    name="store_id"
    label="@lang('stores::stores.singular')"
    placeholder="@lang('stores::stores.select')"
    remote-url="{{ route('stores.select') }}"
    value="{{ $category->store_id ?? old('store_id') }}"
></select2>
