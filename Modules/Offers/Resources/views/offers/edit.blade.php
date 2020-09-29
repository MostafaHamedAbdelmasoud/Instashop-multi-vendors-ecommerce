@extends('dashboard::layouts.master', ['title' => $offer->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $offer->name)
        @slot('breadcrumbs', ['dashboard.Offers.edit', $offer])

        {{ BsForm::resource('Offers::Offers')->putModel($offer, route('dashboard.Offers.update', $offer) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('offers::offers.actions.edit'))

            @include('Offers::Offers.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('offers::offers.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
