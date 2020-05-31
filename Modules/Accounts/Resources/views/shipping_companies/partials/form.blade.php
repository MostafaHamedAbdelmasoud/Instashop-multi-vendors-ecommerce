@include('dashboard::errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
<select2 name="city_id"
         label="@lang('countries::cities.singular')"
         remote-url="{{ route('cities.select') }}"
         value="{{ 4 ?? old('city_id') }}"
></select2>
@endBsMultilangualFormTabs
{{ BsForm::text('price') }}


