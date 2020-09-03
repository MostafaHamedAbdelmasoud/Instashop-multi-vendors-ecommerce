<?php

Breadcrumbs::for('dashboard.order_statuses.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('order_statuses::order_statuses.plural'), route('dashboard.order_statuses.index'));
});

Breadcrumbs::for('dashboard.order_statuses.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.order_statuses.index');
    $breadcrumb->push(trans('order_statuses::order_statuses.actions.create'), route('dashboard.order_statuses.create'));
});

Breadcrumbs::for('dashboard.order_statuses.show', function ($breadcrumb, $orderStatus) {
    $breadcrumb->parent('dashboard.order_statuses.index');
    $breadcrumb->push($orderStatus->name, route('dashboard.order_statuses.show', $orderStatus));
});

Breadcrumbs::for('dashboard.order_statuses.edit', function ($breadcrumb, $orderStatus) {
    $breadcrumb->parent('dashboard.order_statuses.show', $orderStatus);
    $breadcrumb->push(trans('order_statuses::order_statuses.actions.edit'), route('dashboard.order_statuses.edit', $orderStatus));
});
