@extends('dashboard::layouts.master', ['title' => $orderProduct->order_id])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $orderProduct->order_id)
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
            </div>
        </div>





    @endcomponent
@endsection
