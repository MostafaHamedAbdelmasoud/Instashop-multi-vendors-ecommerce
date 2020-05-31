@extends('dashboard::layouts.master', ['title' => trans('accounts::stores.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::stores.plural'))
        @slot('breadcrumbs', ['dashboard.stores.create'])

        {{ BsForm::resource('accounts::stores')->post(route('dashboard.stores.store'), ['files' => false]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::stores.actions.create'))

            @include('accounts::stores.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::stores.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

