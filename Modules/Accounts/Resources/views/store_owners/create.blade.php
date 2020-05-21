@extends('dashboard::layouts.master', ['title' => trans('accounts::store_owners.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::store_owners.plural'))
        @slot('breadcrumbs', ['dashboard.store_owners.create'])

        {{ BsForm::resource('accounts::store_owners')->post(route('dashboard.store_owners.store'), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::store_owners.actions.create'))

            @include('accounts::store_owners.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::store_owners.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

