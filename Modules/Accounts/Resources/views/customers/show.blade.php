@extends('dashboard::layouts.master', ['title' => $customer->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $customer->name)
        @slot('breadcrumbs', ['dashboard.customers.show', $customer])
        @component('dashboard::layouts.components.box')
            @slot('bodyClass', 'p-0')

            <table class="table table-striped table-middle">
                <tbody>
                <tr>
                    <th width="200">@lang('accounts::customers.attributes.name')</th>
                    <td>{{ $customer->name }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::customers.attributes.email')</th>
                    <td>{{ $customer->email }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::customers.attributes.phone')</th>
                    <td>{{ $customer->phone }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::customers.attributes.avatar')</th>
                    <td>
                        <img src="{{ $customer->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $customer->name }}">
                    </td>
                </tr>
                </tbody>
            </table>

            @slot('footer')
                @include('accounts::customers.partials.actions.edit')
                @include('accounts::customers.partials.actions.delete')
            @endslot
        @endcomponent
        <div class="row">
            <div class="col-md-4">
                {{ BsForm::resource('accounts::addresses')
                    ->post(route('dashboard.customers.addresses.store', $customer)) }}
                @component('dashboard::layouts.components.box')
                    @slot('title', trans('accounts::addresses.actions.create'))

                    @include('accounts::addresses.partials.form')

                    @slot('footer')
                        {{ BsForm::submit()->label(trans('accounts::addresses.actions.save')) }}
                    @endslot
                @endcomponent
                {{ BsForm::close() }}
            </div>
            <div class="col-md-8">
                @component('dashboard::layouts.components.table-box')

                    @slot('title', trans('accounts::addresses.actions.list'))

                    <thead>
                    <tr>
                        <th>@lang('accounts::addresses.attributes.address')</th>
                        <th>@lang('accounts::addresses.attributes.city_id')</th>
                        <th style="width: 160px">...</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($addresses as $address)
                        <tr>
                            <td>{{ $address->address }}</td>
                            <td>{{ $address->city->name }}</td>
                            <td style="width: 160px">
                                @include('accounts::addresses.partials.actions.edit')
                                @include('accounts::addresses.partials.actions.delete')
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100" class="text-center">@lang('accounts::addresses.empty')</td>
                        </tr>
                    @endforelse

                    @if($addresses->hasPages())
                        @slot('footer')
                            {{ $addresses->links() }}
                        @endslot
                    @endif
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
