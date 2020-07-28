@extends('dashboard::layouts.master', ['title' => $category->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $category->name)
        @slot('breadcrumbs', ['dashboard.categories.show', $category])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('categories::categories.attributes.name')</th>
                            <td>{{ $category->name }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('categories::categories.attributes.parent_id')</th>
                            @if(!$category->parent_id)
                                <td>__</td>
                            @else
                                <td>{{$category->subCategories->name}}</td>

                            @endif
                        </tr>
                        <tr>
                            <th width="200">@lang('categories::categories.attributes.published_at')</th>
                            <td>
                                {{$category->getPublishedDate()}}
                            </td>
                        </tr>

                        </tbody>
                    </table>

                    @slot('footer')
                        @include('categories::categories.partials.actions.edit')
                        @include('categories::categories.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
