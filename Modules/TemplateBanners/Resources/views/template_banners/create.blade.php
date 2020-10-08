@extends('dashboard::layouts.master', ['title' => trans('template_banners::template_banners.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('template_banners::template_banners.plural'))
        @slot('breadcrumbs', ['dashboard.template_banners.create'])

        {{ BsForm::resource('template_banners::template_banners')->post(route('dashboard.template_banners.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('template_banners::template_banners.actions.create'))

            @include('template_banners::template_banners.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('template_banners::template_banners.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
