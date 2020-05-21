@extends('dashboard::layouts.master', ['title' => trans('accounts::supervisors.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::supervisors.plural'))
        @slot('breadcrumbs', ['dashboard.supervisors.create'])

        {{ BsForm::resource('accounts::supervisors')->post(route('dashboard.supervisors.store'), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::supervisors.actions.create'))

            @include('accounts::supervisors.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::supervisors.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

