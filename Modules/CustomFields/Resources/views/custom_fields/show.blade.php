@extends('dashboard::layouts.master', ['title' => $customField->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $customField->name)
        @slot('breadcrumbs', ['dashboard.custom_fields.show', $customField])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.name')</th>
                            <td>{{ $customField->name }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.description')</th>
                            <td>
                                {{$customField->description}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.meta_description')</th>
                            <td>
                                {{$customField->meta_description}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.category')</th>
                            <td>
                                <a href="{{ route('dashboard.categories.show', $customField->category) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$customField->getCategoryOfProduct()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.store')</th>
                            <td>
                                <a href="{{ route('dashboard.stores.show', $customField->store) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$customField->getStoreOfProduct()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.code')</th>
                            <td>
                                    {{$customField->code}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.old_price')</th>
                            <td>
                                <del style="del">
                                    {{$customField->old_price}}
                                </del>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.price')</th>
                            <td>
                                {{$customField->price}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.weight')</th>
                            <td>

                                @if($customField -> getWeightOfProduct() >= 1000)
                                    {{$customField->getWeightOfProduct()/1000}} @lang('custom_fields::custom_fields.units.kilo_gram')
                                @else
                                    {{$customField->getWeightOfProduct()}} @lang('custom_fields::custom_fields.units.gram')
                                @endif
                            </td>
                        </tr>


                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.stock')</th>
                            <td>
                                {{$customField->stock}} @lang('custom_fields::custom_fields.units.piece')
                            </td>
                        </tr>





                        </tbody>
                    </table>

                    @slot('footer')
                        @include('custom_fields::custom_fields.partials.actions.edit')
                        @include('custom_fields::custom_fields.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
