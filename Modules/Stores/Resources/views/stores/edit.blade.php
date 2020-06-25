@extends('dashboard::layouts.master', ['title' => $store->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $store->name)
        @slot('breadcrumbs', ['dashboard.stores.edit', $store])

        {{ BsForm::resource('stores::stores')->putModel($store, route('dashboard.stores.update', $store) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('stores::stores.actions.edit'))

            @include('stores::stores.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('stores::stores.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
