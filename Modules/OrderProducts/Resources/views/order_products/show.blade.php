@extends('dashboard::layouts.master', ['title' => $orderProduct->product->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $orderProduct->product->name)
        @slot('breadcrumbs', ['dashboard.order_products.show', $orderProduct])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>

                        <tr>
                            <th width="200">@lang('order_products::order_products.attributes.order_id')</th>
                            <td>
                                <a href="{{ route('dashboard.orders.show', $orderProduct->order) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$orderProduct->getOrderId()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('order_products::order_products.attributes.product_id')</th>
                            <td>
                                <a href="{{ route('dashboard.products.show', $orderProduct->product) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$orderProduct->getProductName()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('order_products::order_products.attributes.price')</th>
                            <td>
                                    {{$orderProduct->getProductPrice()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('order_products::order_products.attributes.quantity')</th>
                            <td>
                                <del style="del">
                                    {{$orderProduct->quantity}}
                                </del>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('order_products::order_products.attributes.total')</th>
                            <td>
                                {{$orderProduct->getProductTotal()}}
                            </td>
                        </tr>


                        </tbody>
                    </table>

                    @slot('footer')
                        @include('order_products::order_products.partials.actions.edit')
                        @include('order_products::order_products.partials.actions.delete')
                    @endslot
                @endcomponent

                    <div class="row">
                        <div class="col-md-4">
                            {{ BsForm::resource('order_products::order_product_field_values')
                                ->post(route('dashboard.order_products.order_product_field_values.store', $orderProduct)) }}
                            @component('dashboard::layouts.components.box')
                                @slot('title', trans('order_products::order_product_field_values.actions.create'))

                                @include('order_products::order_product_field_values.partials.form')

                                @slot('footer')
                                    {{ BsForm::submit()->label(trans('order_products::order_product_field_values.actions.save')) }}
                                @endslot
                            @endcomponent
                            {{ BsForm::close() }}
                        </div>
                        <div class="col-md-8">
                            @component('dashboard::layouts.components.table-box')

                                @slot('title', trans('order_products::order_product_field_values.actions.list'))

                                <thead>
                                <tr>
                                    <th>@lang('order_products::order_product_field_values.attributes.custom_field_id')</th>
                                    <th>@lang('order_products::order_product_field_values.attributes.option_id')</th>
                                    <th>@lang('order_products::order_product_field_values.attributes.value')</th>
                                    <th>@lang('order_products::order_product_field_values.attributes.additional_price')</th>
                                    <th style="width: 160px">...</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orderProductFieldValues as $orderProductFieldValue)
                                    <tr>
                                        <td>{{ $orderProductFieldValue->customField->name }}</td>
                                        <td>{{ $orderProductFieldValue->customFieldOption->name }}</td>
                                        <td>{{ $orderProductFieldValue->value }}</td>
                                        <td>{{ $orderProductFieldValue->additional_price }}</td>
                                        <td style="width: 160px">
                                            @include('order_products::order_product_field_values.partials.actions.edit')
                                            @include('order_products::order_product_field_values.partials.actions.delete')
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100" class="text-center">@lang('order_products::order_product_field_values.empty')</td>
                                    </tr>
                                @endforelse

                                @if($orderProductFieldValues->hasPages())
                                    @slot('footer')
                                        {{ $orderProductFieldValues->links() }}
                                    @endslot
                                @endif
                            @endcomponent
                        </div>
                    </div>

            </div>
        </div>





    @endcomponent
@endsection
