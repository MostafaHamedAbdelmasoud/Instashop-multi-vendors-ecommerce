<?php



Breadcrumbs::for('dashboard.order_products.order_product_field_values.edit', function ($breadcrumb, $orderProduct, $orderProductFieldValue) {
    $breadcrumb->parent('dashboard.order_products.show', $orderProduct);
    $breadcrumb->push(trans('order_products::order_product_field_values.actions.edit'), route('dashboard.order_products.order_product_field_values.edit', [$orderProduct, $orderProductFieldValue]));
});
