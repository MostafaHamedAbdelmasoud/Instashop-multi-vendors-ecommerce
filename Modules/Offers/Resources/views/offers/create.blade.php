@extends('dashboard::layouts.master', ['title' => trans('offers::offers.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('offers::offers.plural'))
        @slot('breadcrumbs', ['dashboard.Offers.create'])

        {{ BsForm::resource('Offers::Offers')->post(route('dashboard.Offers.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('offers::offers.actions.create'))

            @include('Offers::Offers.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('offers::offers.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
