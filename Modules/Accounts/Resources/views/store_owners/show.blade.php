@extends('dashboard::layouts.master', ['title' => $storeOwner->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $storeOwner->name)
        @slot('breadcrumbs', ['dashboard.store_owners.show', $storeOwner])

        <div class="row">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{ $storeOwner->name }}</h3>
                        <h5 class="widget-user-desc">
                            {{ $storeOwner->present()->type }}
                        </h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2"
                             src="{{ $storeOwner->getAvatar() }}"
                             alt="{{ $storeOwner->name }}">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header mb-2">
                                        <i class="fas fa-envelope fa-lg"></i>
                                    </h5>
                                    <span class="description-text">
                                         {{ $storeOwner->email }}
                                    </span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header mb-2">
                                        <i class="fas fa-phone fa-lg"></i>
                                    </h5>
                                    <span class="description-text">
                                        {{ $storeOwner->phone }}
                                    </span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header mb-2">
                                        <i class="fas fa-calendar-alt fa-lg"></i>
                                    </h5>
                                    <span class="description-text">
                                        {{ $storeOwner->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->


                        </div>
                        <!-- /.row -->
                        <div class="mt-4">
                            @include('accounts::store_owners.partials.actions.edit')
                            @include('accounts::store_owners.partials.actions.delete')
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endcomponent


@endsection
