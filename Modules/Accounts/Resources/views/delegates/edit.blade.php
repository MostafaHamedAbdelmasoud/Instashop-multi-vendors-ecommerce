@extends('dashboard::layouts.master', ['title' => $delegate->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $delegate->name)
        @slot('breadcrumbs', ['dashboard.delegates.edit', $delegate])

        {{ BsForm::resource('accounts::delegates')->putModel($delegate, route('dashboard.delegates.update', $delegate), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::delegates.actions.edit'))

            @include('accounts::delegates.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::delegates.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
