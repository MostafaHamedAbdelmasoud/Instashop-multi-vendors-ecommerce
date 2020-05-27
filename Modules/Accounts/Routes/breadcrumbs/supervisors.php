<?php

Breadcrumbs::for('dashboard.supervisors.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('accounts::supervisors.plural'), route('dashboard.supervisors.index'));
});

Breadcrumbs::for('dashboard.supervisors.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.supervisors.index');
    $breadcrumb->push(trans('accounts::supervisors.actions.create'), route('dashboard.supervisors.create'));
});

Breadcrumbs::for('dashboard.supervisors.show', function ($breadcrumb, $storeOwner) {
    $breadcrumb->parent('dashboard.supervisors.index');
    $breadcrumb->push($storeOwner->name, route('dashboard.supervisors.show', $storeOwner));
});

Breadcrumbs::for('dashboard.supervisors.edit', function ($breadcrumb, $storeOwner) {
    $breadcrumb->parent('dashboard.supervisors.show', $storeOwner);
    $breadcrumb->push(trans('accounts::supervisors.actions.edit'), route('dashboard.supervisors.edit', $storeOwner));
});
