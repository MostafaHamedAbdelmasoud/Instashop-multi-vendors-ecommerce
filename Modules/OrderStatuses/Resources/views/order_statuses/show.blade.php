@extends('dashboard::layouts.master', ['title' => $orderStatus->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $orderStatus->name)
        @slot('breadcrumbs', ['dashboard.order_statuses.show', $orderStatus])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('order_statuses::order_statuses.attributes.name')</th>
                        <td>{{ $orderStatus->name }}</td>
                    </tr>

                    <tr>
                        <th width="200">@lang('order_statuses::order_statuses.attributes.type')</th>
                        <td>
                                {{ $orderStatus->type }}
                        </td>
                    </tr>

                    </tbody>
                </table>

                @slot('footer')
                    @include('order_statuses::order_statuses.partials.actions.edit')
                    @include('order_statuses::order_statuses.partials.actions.delete')
                @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
