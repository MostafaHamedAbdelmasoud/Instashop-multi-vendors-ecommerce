@extends('dashboard::layouts.master', ['title' => $storeOwner->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $storeOwner->name)
        @slot('breadcrumbs', ['dashboard.store_owners.edit', $storeOwner])

        {{ BsForm::resource('accounts::store_owners')->putModel($storeOwner, route('dashboard.store_owners.update', $storeOwner), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::store_owners.actions.edit'))

            @include('accounts::store_owners.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::store_owners.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
