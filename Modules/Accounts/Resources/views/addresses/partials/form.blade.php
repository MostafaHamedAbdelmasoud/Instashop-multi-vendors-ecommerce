@include('dashboard::errors')
{{ BsForm::text('address') }}
{{ BsForm::number('is_primay') }}
<select2 name="city_id"
         label="@lang('countries::cities.singular')"
         remote-url="{{ route('cities.select') }}"
         value="{{ $address->city_id ?? old('city_id') }}"
></select2>
