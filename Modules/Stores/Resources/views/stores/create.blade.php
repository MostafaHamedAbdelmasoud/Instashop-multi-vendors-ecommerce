@extends('dashboard::layouts.master', ['title' => trans('stores::stores.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('stores::stores.plural'))
        @slot('breadcrumbs', ['dashboard.stores.create'])

        {{ BsForm::resource('stores::stores')->post(route('dashboard.stores.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('stores::stores.actions.create'))

            @include('stores::stores.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('stores::stores.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
