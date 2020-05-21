@extends('dashboard::layouts.master', ['title' => trans('accounts::addresses.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::addresses.plural'))
        @slot('breadcrumbs', ['dashboard.addresses.create'])

        {{ BsForm::resource('accounts::addresses')->post(route('dashboard.addresses.store'), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::addresses.actions.create'))

            @include('accounts::addresses.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::addresses.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

