@extends('dashboard::layouts.master', ['title' => trans('custom_field_options::custom_field_options.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('custom_field_options::custom_field_options.plural'))
        @slot('breadcrumbs', ['dashboard.custom_field_options.create'])

        {{ BsForm::resource('custom_field_options::custom_field_options')->post(route('dashboard.custom_field_options.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('custom_field_options::custom_field_options.actions.create'))

            @include('custom_field_options::custom_field_options.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('custom_field_options::custom_field_options.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
