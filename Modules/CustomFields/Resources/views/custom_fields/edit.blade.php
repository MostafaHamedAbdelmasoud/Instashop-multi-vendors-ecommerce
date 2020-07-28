@extends('dashboard::layouts.master', ['title' => $customField->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $customField->name)
        @slot('breadcrumbs', ['dashboard.custom_fields.edit', $customField])

        {{ BsForm::resource('custom_fields::custom_fields')->putModel($customField, route('dashboard.custom_fields.update', $customField) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('custom_fields::custom_fields.actions.edit'))

            @include('custom_fields::custom_fields.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('custom_fields::custom_fields.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
