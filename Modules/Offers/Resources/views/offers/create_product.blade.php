@extends('dashboard::layouts.master', ['title' => trans('offers::offers.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('offers::offers.plural'))
        @slot('breadcrumbs', ['dashboard.offers.create_product_offer'])

        {{ BsForm::resource('offers::offers')->post(route('dashboard.store.create_product_offer','product') ) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('offers::offers.actions.create'))

            @include('offers::offers.partials.CreateProductform')

            @slot('footer')
                {{ BsForm::submit()->label(trans('offers::offers.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
