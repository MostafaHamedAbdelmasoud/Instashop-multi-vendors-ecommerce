@include('dashboard::errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs
<select2 name="city_id"
         label="@lang('countries::cities.singular')"
         remote-url="{{ route('cities.select') }}"
         value="{{ $shippingcity_id ?? old('city_id') }}"
></select2>
{{ BsForm::text('price') }}


