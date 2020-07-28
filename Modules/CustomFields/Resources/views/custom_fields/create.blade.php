@extends('dashboard::layouts.master', ['title' => trans('custom_fields::custom_fields.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('custom_fields::custom_fields.plural'))
        @slot('breadcrumbs', ['dashboard.custom_fields.create'])

        {{ BsForm::resource('custom_fields::custom_fields')->post(route('dashboard.custom_fields.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('custom_fields::custom_fields.actions.create'))

            @include('custom_fields::custom_fields.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('custom_fields::custom_fields.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
