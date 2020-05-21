@extends('dashboard::layouts.master', ['title' => trans('accounts::delegates.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::delegates.plural'))
        @slot('breadcrumbs', ['dashboard.delegates.create'])

        {{ BsForm::resource('accounts::delegates')->post(route('dashboard.delegates.store'), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::delegates.actions.create'))

            @include('accounts::delegates.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::delegates.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

