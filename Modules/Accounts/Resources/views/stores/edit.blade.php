@extends('dashboard::layouts.master', ['title' => $store->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $store->name)
        @slot('breadcrumbs', ['dashboard.store_owners.stores.edit', $storeOwner, $store])

        {{ BsForm::resource('accounts::stores')->putModel($store, route('dashboard.store_owners.stores.update', [$storeOwner, $store])) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::stores.actions.edit'))

            @include('accounts::stores.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::stores.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
