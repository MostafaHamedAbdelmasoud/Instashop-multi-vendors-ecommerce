@extends('dashboard::layouts.master', ['title' => trans('categories::categories.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('categories::categories.plural'))
        @slot('breadcrumbs', ['dashboard.categories.create'])

        {{ BsForm::resource('categories::categories')->post(route('dashboard.categories.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('categories::categories.actions.create'))

            @include('categories::categories.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('categories::categories.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
