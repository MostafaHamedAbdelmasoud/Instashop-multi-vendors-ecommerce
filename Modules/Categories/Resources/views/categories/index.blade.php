@extends('dashboard::layouts.master', ['title' => trans('categories::categories.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('categories::categories.plural'))
        @slot('breadcrumbs', ['dashboard.categories.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('categories::categories.actions.list'))
            @slot('tools')
                @include('categories::categories.partials.actions.filter')
                @include('categories::categories.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('categories::categories.attributes.name')</th>
                <th class="d-none d-md-table-cell">@lang('categories::categories.attributes.parent_id')</th>
                <th class="d-none d-md-table-cell">@lang('categories::categories.attributes.store_id')</th>
                <th class="d-none d-md-table-cell">@lang('categories::categories.attributes.published_at')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.categories.show', $category) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $category->name }}
                        </a>
                    </td>
                    <td class="d-none d-md-table-cell">

                        @if($category->parent_id == null )
                            ____
                        @else
                            <a href="{{ route('dashboard.categories.show', $category->subCategories) }}"
                               class="text-decoration-none text-ellipsis">
                                {{$category->subCategories->name}}
                            </a>
                        @endif
                    </td>

                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.stores.show', $category->store) }}"
                           class="text-decoration-none text-ellipsis">
                            {{$category->store->name}}
                        </a>
                    </td>
                    <td class="d-none d-md-table-cell">
                        {{$category->getPublishedDate()}}
                    </td>

                    <td style="width: 160px">
                        @include('categories::categories.partials.actions.show')
                        @include('categories::categories.partials.actions.edit')
                        @include('categories::categories.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('categories::categories.empty')</td>
                </tr>
            @endforelse

            @if($categories->hasPages())
                @slot('footer')
                    {{ $categories->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
