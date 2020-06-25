<?php

Breadcrumbs::for('dashboard.stores.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('stores::stores.plural'), route('dashboard.stores.index'));
});

Breadcrumbs::for('dashboard.stores.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.stores.index');
    $breadcrumb->push(trans('stores::stores.actions.create'), route('dashboard.stores.create'));
});

Breadcrumbs::for('dashboard.stores.show', function ($breadcrumb, $country) {
    $breadcrumb->parent('dashboard.stores.index');
    $breadcrumb->push($country->name, route('dashboard.stores.show', $country));
});

Breadcrumbs::for('dashboard.stores.edit', function ($breadcrumb, $country) {
    $breadcrumb->parent('dashboard.stores.show', $country);
    $breadcrumb->push(trans('stores::stores.actions.edit'), route('dashboard.stores.edit', $country));
});
