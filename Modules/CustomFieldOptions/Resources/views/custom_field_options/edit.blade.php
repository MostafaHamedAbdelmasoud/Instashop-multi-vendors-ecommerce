@extends('dashboard::layouts.master', ['title' => $customFieldOption->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $customFieldOption->name)
        @slot('breadcrumbs', ['dashboard.custom_field_options.edit', $customFieldOption])

        {{ BsForm::resource('custom_field_options::custom_field_options')->putModel($customFieldOption, route('dashboard.custom_field_options.update', $customFieldOption) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('custom_field_options::custom_field_options.actions.edit'))

            @include('custom_field_options::custom_field_options.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('custom_field_options::custom_field_options.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
