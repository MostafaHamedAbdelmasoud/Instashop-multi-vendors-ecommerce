@extends('dashboard::layouts.master')
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('dashboard::dashboard.home'))
        @slot('breadcrumbs', ['dashboard.home'])

    @endcomponent
@endsection
