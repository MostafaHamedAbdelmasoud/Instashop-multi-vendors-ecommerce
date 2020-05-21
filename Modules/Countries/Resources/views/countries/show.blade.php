@extends('dashboard::layouts.master', ['title' => $country->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $country->name)
        @slot('breadcrumbs', ['dashboard.countries.show', $country])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.name')</th>
                            <td>{{ $country->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.currency')</th>
                            <td>{{ $country->currency }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.code')</th>
                            <td>{{ $country->code }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.key')</th>
                            <td>{{ $country->key }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.flag')</th>
                            <td>
                                <img src="{{ $country->getFlag() }}"
                                     class="img img-size-64"
                                     alt="{{ $country->name }}">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('countries::countries.partials.actions.edit')
                        @include('countries::countries.partials.actions.delete')
                    @endslot
                @endcomponent
                {{ BsForm::resource('countries::cities')
                ->post(route('dashboard.countries.cities.store', $country)) }}
                @component('dashboard::layouts.components.box')
                    @slot('title', trans('countries::cities.actions.create'))
                    @include('dashboard::errors')
                    @bsMultilangualFormTabs
                    {{ BsForm::text('name')->maxlength(255) }}
                    @endBsMultilangualFormTabs

                    @slot('footer')
                        {{ BsForm::submit(trans('countries::cities.actions.save')) }}
                    @endslot
                @endcomponent
                {{ BsForm::close() }}
            </div>
            <div class="col-md-6">
                @component('dashboard::layouts.components.table-box')
                    @slot('bodyClass', 'p-0')
                    @slot('title', trans('countries::cities.plural'))
                    <tr>
                        <th width="100">#</th>
                        <th>@lang('countries::cities.attributes.name')</th>
                        <th>...</th>
                    </tr>
                    @foreach($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->name }}</td>
                            <td>
                                @include('countries::cities.partials.actions.edit')
                                @include('countries::cities.partials.actions.delete')
                            </td>
                        </tr>
                    @endforeach
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
