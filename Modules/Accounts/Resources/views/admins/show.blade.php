@extends('dashboard::layouts.master', ['title' => $admin->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $admin->name)
        @slot('breadcrumbs', ['dashboard.admins.show', $admin])

        @component('dashboard::layouts.components.box')
            @slot('bodyClass', 'p-0')

            <table class="table table-striped table-middle">
                <tbody>
                <tr>
                    <th width="200">@lang('accounts::admins.attributes.name')</th>
                    <td>{{ $admin->name }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::admins.attributes.email')</th>
                    <td>{{ $admin->email }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::admins.attributes.phone')</th>
                    <td>{{ $admin->phone }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::admins.attributes.avatar')</th>
                    <td>
                        <img src="{{ $admin->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $admin->name }}">
                    </td>
                </tr>
                </tbody>
            </table>

            @slot('footer')
                @include('accounts::admins.partials.actions.edit')
                @include('accounts::admins.partials.actions.delete')
            @endslot
        @endcomponent
    @endcomponent
@endsection
