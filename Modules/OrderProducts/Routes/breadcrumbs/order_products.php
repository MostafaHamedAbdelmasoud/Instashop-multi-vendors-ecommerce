<?php

Breadcrumbs::for('dashboard.order_products.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('order_products::order_products.plural'), route('dashboard.order_products.index'));
});

Breadcrumbs::for('dashboard.order_products.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.order_products.index');
    $breadcrumb->push(trans('order_products::order_products.actions.create'), route('dashboard.order_products.create'));
});

Breadcrumbs::for('dashboard.order_products.show', function ($breadcrumb, $orderProduct) {
    $breadcrumb->parent('dashboard.order_products.index');
    $breadcrumb->push($orderProduct->order_id, route('dashboard.order_products.show', $orderProduct));
});

Breadcrumbs::for('dashboard.order_products.edit', function ($breadcrumb, $orderProduct) {
    $breadcrumb->parent('dashboard.order_products.show', $orderProduct);
    $breadcrumb->push(trans('order_products::order_products.actions.edit'), route('dashboard.order_products.edit', $orderProduct));
});
