<?php


Breadcrumbs::for('dashboard.order_status_updates.edit', function ($breadcrumb, $order, $orderStatusUpdate) {
    $breadcrumb->push(trans('orders::order_status_updates.actions.edit'), route('dashboard.orders.order_status_updates.edit', [$order, $orderStatusUpdate]));
});
