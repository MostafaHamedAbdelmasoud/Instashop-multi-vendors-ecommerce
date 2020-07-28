@extends('dashboard::layouts.master', ['title' => trans('custom_fields::custom_fields.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('custom_fields::custom_fields.plural'))
        @slot('breadcrumbs', ['dashboard.custom_fields.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('custom_fields::custom_fields.actions.list'))
            @slot('tools')
                @include('custom_fields::custom_fields.partials.actions.filter')
                @include('custom_fields::custom_fields.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('custom_fields::custom_fields.attributes.name')</th>
                <th class="d-none d-md-table-cell">@lang('custom_fields::custom_fields.attributes.category_id')</th>
                <th class="d-none d-md-table-cell">@lang('custom_fields::custom_fields.attributes.store_id')</th>
                <th class="d-none d-md-table-cell">@lang('custom_fields::custom_fields.attributes.type')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($customFields as $customField)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.custom_fields.show', $customField) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $customField->name }}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.categories.show', $customField->category) }}"
                           class="text-decoration-none text-ellipsis">
                            {{$customField->category->name}}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.stores.show', $customField->store) }}"
                           class="text-decoration-none text-ellipsis">
                            {{$customField->store->name}}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$customField->type}}
                    </td>


                    <td style="width: 160px">
                        @include('custom_fields::custom_fields.partials.actions.show')
                        @include('custom_fields::custom_fields.partials.actions.edit')
                        @include('custom_fields::custom_fields.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('custom_fields::custom_fields.empty')</td>
                </tr>
            @endforelse

            @if($customFields->hasPages())
                @slot('footer')
                    {{ $customFields->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
