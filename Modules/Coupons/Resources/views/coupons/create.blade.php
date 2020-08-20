@extends('dashboard::layouts.master', ['title' => trans('coupons::coupons.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('coupons::coupons.plural'))
        @slot('breadcrumbs', ['dashboard.coupons.create'])

        {{ BsForm::resource('coupons::coupons')->post(route('dashboard.coupons.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('coupons::coupons.actions.create'))

            @include('coupons::coupons.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('coupons::coupons.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
