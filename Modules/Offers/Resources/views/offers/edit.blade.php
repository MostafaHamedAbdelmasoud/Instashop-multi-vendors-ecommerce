@extends('dashboard::layouts.master', ['title' => $offer->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $offer->name)
        @slot('breadcrumbs', ['dashboard.offers.edit', $offer])

        {{ BsForm::resource('offers::offers')->putModel($offer, route('dashboard.offers.update', $offer) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('offers::offers.actions.edit'))

            @include('offers::offers.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('offers::offers.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
