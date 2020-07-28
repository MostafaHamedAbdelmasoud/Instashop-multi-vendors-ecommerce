@extends('dashboard::layouts.master', ['title' => $product->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $product->name)
        @slot('breadcrumbs', ['dashboard.products.edit', $product])

        {{ BsForm::resource('products::products')->putModel($product, route('dashboard.products.update', $product) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('products::products.actions.edit'))

            @include('products::products.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('products::products.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
