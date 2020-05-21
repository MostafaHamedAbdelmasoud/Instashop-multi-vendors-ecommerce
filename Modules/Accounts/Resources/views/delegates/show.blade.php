@extends('dashboard::layouts.master', ['title' => $delegate->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $delegate->name)
        @slot('breadcrumbs', ['dashboard.delegates.show', $delegate])

        <div class="row">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{ $delegate->name }}</h3>
                        <h5 class="widget-user-desc">
                            {{ $delegate->present()->type }}
                        </h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2"
                             src="{{ $delegate->getAvatar() }}"
                             alt="{{ $delegate->name }}">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header mb-2">
                                        <i class="fas fa-envelope fa-lg"></i>
                                    </h5>
                                    <span class="description-text">
                                         {{ $delegate->email }}
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
                                        {{ $delegate->phone }}
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
                                        {{ $delegate->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->

                             
                        </div>
                        <!-- /.row -->
                        <div class="mt-4">
                            @include('accounts::delegates.partials.actions.edit')
                            @include('accounts::delegates.partials.actions.delete')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endcomponent
@endsection
