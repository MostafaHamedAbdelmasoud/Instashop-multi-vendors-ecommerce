<?php

Breadcrumbs::for('dashboard.store_owners.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('accounts::store_owners.plural'), route('dashboard.store_owners.index'));
});

Breadcrumbs::for('dashboard.store_owners.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.store_owners.index');
    $breadcrumb->push(trans('accounts::store_owners.actions.create'), route('dashboard.store_owners.create'));
});

Breadcrumbs::for('dashboard.store_owners.show', function ($breadcrumb, $storeOwner) {
    $breadcrumb->parent('dashboard.store_owners.index');
    $breadcrumb->push($storeOwner->name, route('dashboard.store_owners.show', $storeOwner));
});

Breadcrumbs::for('dashboard.store_owners.edit', function ($breadcrumb, $storeOwner) {
    $breadcrumb->parent('dashboard.store_owners.show', $storeOwner);
    $breadcrumb->push(trans('accounts::store_owners.actions.edit'), route('dashboard.store_owners.edit', $storeOwner));
});
