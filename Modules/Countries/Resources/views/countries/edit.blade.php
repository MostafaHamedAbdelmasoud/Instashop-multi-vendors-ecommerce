@extends('dashboard::layouts.master', ['title' => $country->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $country->name)
        @slot('breadcrumbs', ['dashboard.countries.edit', $country])

        {{ BsForm::resource('countries::countries')->putModel($country, route('dashboard.countries.update', $country), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('countries::countries.actions.edit'))

            @include('countries::countries.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('countries::countries.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
