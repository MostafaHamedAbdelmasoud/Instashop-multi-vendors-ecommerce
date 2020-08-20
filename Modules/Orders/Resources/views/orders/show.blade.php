@extends('dashboard::layouts.master', ['title' => $product->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $product->name)
        @slot('breadcrumbs', ['dashboard.products.show', $product])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('products::products.attributes.name')</th>
                            <td>{{ $product->name }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('products::products.attributes.description')</th>
                            <td>
                                {{$product->description}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('products::products.attributes.meta_description')</th>
                            <td>
                                {{$product->meta_description}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('products::products.attributes.category_id')</th>
                            <td>
                                <a href="{{ route('dashboard.categories.show', $product->category) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$product->getCategoryOfProduct()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('products::products.attributes.store_id')</th>
                            <td>
                                <a href="{{ route('dashboard.stores.show', $product->store) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$product->getStoreOfProduct()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('products::products.attributes.code')</th>
                            <td>
                                    {{$product->code}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('products::products.attributes.old_price')</th>
                            <td>
                                <del style="del">
                                    {{$product->old_price}}
                                </del>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('products::products.attributes.price')</th>
                            <td>
                                {{$product->price}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('products::products.attributes.weight')</th>
                            <td>

                                @if($product -> getWeightOfProduct() >= 1000)
                                    {{$product->getWeightOfProduct()/1000}} @lang('products::products.units.kilo_gram')
                                @else
                                    {{$product->getWeightOfProduct()}} @lang('products::products.units.gram')
                                @endif
                            </td>
                        </tr>


                        <tr>
                            <th width="200">@lang('products::products.attributes.stock')</th>
                            <td>
                                {{$product->stock}} @lang('products::products.units.piece')
                            </td>
                        </tr>





                        </tbody>
                    </table>

                    @slot('footer')
                        @include('products::products.partials.actions.edit')
                        @include('products::products.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
