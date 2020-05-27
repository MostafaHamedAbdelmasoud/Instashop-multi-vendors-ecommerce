@extends('dashboard::layouts.master', ['title' => $supervisor->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $supervisor->name)
        @slot('breadcrumbs', ['dashboard.supervisors.edit', $supervisor])

        {{ BsForm::resource('accounts::supervisors')->putModel($supervisor, route('dashboard.supervisors.update', $supervisor), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::supervisors.actions.edit'))

            @include('accounts::supervisors.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::supervisors.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
