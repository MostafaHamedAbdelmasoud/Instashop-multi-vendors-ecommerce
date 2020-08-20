<?php

Breadcrumbs::for('dashboard.coupons.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('coupons::coupons.plural'), route('dashboard.coupons.index'));
});

Breadcrumbs::for('dashboard.coupons.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.coupons.index');
    $breadcrumb->push(trans('coupons::coupons.actions.create'), route('dashboard.coupons.create'));
});

Breadcrumbs::for('dashboard.coupons.show', function ($breadcrumb, $coupon) {
    $breadcrumb->parent('dashboard.coupons.index');
    $breadcrumb->push($coupon->code, route('dashboard.coupons.show', $coupon));
});

Breadcrumbs::for('dashboard.coupons.edit', function ($breadcrumb, $coupon) {
    $breadcrumb->parent('dashboard.coupons.show', $coupon);
    $breadcrumb->push(trans('coupons::coupons.actions.edit'), route('dashboard.coupons.edit', $coupon));
});
