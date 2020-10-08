@extends('dashboard::layouts.master', ['title' => $templateBanner->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $templateBanner->name)
        @slot('breadcrumbs', ['dashboard.template_banners.edit', $templateBanner])

        {{ BsForm::resource('template_banners::template_banners')->putModel($templateBanner, route('dashboard.template_banners.update', $templateBanner) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('template_banners::template_banners.actions.edit'))

            @include('template_banners::template_banners.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('template_banners::template_banners.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
