@extends('dashboard::layouts.master', ['title' => trans('countries::cities.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('countries::cities.plural'))
        @slot('breadcrumbs', ['dashboard.cities.create'])

        {{ BsForm::resource('countries::cities')->post(route('dashboard.cities.store'), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('countries::cities.actions.create'))

            @include('countries::cities.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('countries::cities.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
