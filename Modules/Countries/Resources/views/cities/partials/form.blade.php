@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs

<select2
        name="country_id"
        label="@lang('countries::countries.singular')"
        placeholder="@lang('countries::countries.select')"
        remote-url="{{ route('countries.select') }}"
        value="{{ $city->country_id ?? old('country_id') }}"
></select2>


