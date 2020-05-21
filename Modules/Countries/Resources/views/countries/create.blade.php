@extends('dashboard::layouts.master', ['title' => trans('countries::countries.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('countries::countries.plural'))
        @slot('breadcrumbs', ['dashboard.countries.create'])

        {{ BsForm::resource('countries::countries')->post(route('dashboard.countries.store'), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('countries::countries.actions.create'))

            @include('countries::countries.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('countries::countries.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
