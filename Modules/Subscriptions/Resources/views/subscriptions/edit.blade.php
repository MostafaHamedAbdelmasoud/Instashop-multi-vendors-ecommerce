@extends('dashboard::layouts.master', ['title' => $subscription->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $subscription->name)
        @slot('breadcrumbs', ['dashboard.subscriptions.edit', $subscription])

        {{ BsForm::resource('subscriptions::subscriptions')->putModel($subscription, route('dashboard.subscriptions.update', $subscription) ) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('subscriptions::subscriptions.actions.edit'))

            @include('subscriptions::subscriptions.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('subscriptions::subscriptions.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
