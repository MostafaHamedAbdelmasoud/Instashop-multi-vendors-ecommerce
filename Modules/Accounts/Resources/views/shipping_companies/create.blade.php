@extends('dashboard::layouts.master', ['title' => trans('accounts::shipping_companies.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::shipping_companies.plural'))
        @slot('breadcrumbs', ['dashboard.shipping_companies.create'])

        {{ BsForm::resource('accounts::shipping_companies')->post(route('dashboard.shipping_companies.store')) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::shipping_companies.actions.create'))

            @include('accounts::shipping_companies.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::shipping_companies.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

