@extends('dashboard::layouts.master', ['title' => trans('accounts::customers.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::customers.plural'))
        @slot('breadcrumbs', ['dashboard.customers.create'])

        {{ BsForm::resource('accounts::customers')->post(route('dashboard.customers.store'), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::customers.actions.create'))

            @include('accounts::customers.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::customers.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

