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
                            <th width="200">@lang('custom_fields::custom_fields.attributes.category_id')</th>
                            <td>
                                <a href="{{ route('dashboard.categories.show', $customField->category) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$customField->getCategoryOfCustomField()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.store_id')</th>
                            <td>
                                <a href="{{ route('dashboard.stores.show', $customField->store) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$customField->getStoreOfCustomField()}}
                                </a>
                            </td>
                        </tr>


                        <tr>
                            <th width="200">@lang('custom_fields::custom_fields.attributes.type')</th>
                            <td>
                                {{$customField->type}}
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
