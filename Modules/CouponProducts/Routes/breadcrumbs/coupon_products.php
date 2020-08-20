<?php

Breadcrumbs::for('dashboard.coupon_products.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('coupon_products::coupon_products.plural'), route('dashboard.coupon_products.index'));
});

Breadcrumbs::for('dashboard.coupon_products.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.coupon_products.index');
    $breadcrumb->push(trans('coupon_products::coupon_products.actions.create'), route('dashboard.coupon_products.create'));
});

Breadcrumbs::for('dashboard.create_coupon_category', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.coupon_products.index');
    $breadcrumb->push(trans('coupon_products::coupon_products.actions.create_coupon_category'), route('dashboard.create_coupon_category'));
});

Breadcrumbs::for('dashboard.coupon_products.show', function ($breadcrumb, $couponProduct) {
    $breadcrumb->parent('dashboard.coupon_products.index');
    $breadcrumb->push($couponProduct->coupon->code, route('dashboard.coupon_products.show', $couponProduct));
});

Breadcrumbs::for('dashboard.coupon_products.edit', function ($breadcrumb, $couponProduct) {
    $breadcrumb->parent('dashboard.coupon_products.show', $couponProduct);
    $breadcrumb->push(trans('coupon_products::coupon_products.actions.edit'), route('dashboard.coupon_products.edit', $couponProduct));
});

Breadcrumbs::for('dashboard.edit_coupon_product', function ($breadcrumb, $couponProduct) {
    $breadcrumb->parent('dashboard.coupon_products.show', $couponProduct);
    $breadcrumb->push(trans('coupon_products::coupon_products.actions.edit_coupon_product'), route('dashboard.edit_coupon_product', $couponProduct));
});
