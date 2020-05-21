<?php

Breadcrumbs::for('dashboard.admins.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('accounts::admins.plural'), route('dashboard.admins.index'));
});

Breadcrumbs::for('dashboard.admins.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.admins.index');
    $breadcrumb->push(trans('accounts::admins.actions.create'), route('dashboard.admins.create'));
});

Breadcrumbs::for('dashboard.admins.show', function ($breadcrumb, $admin) {
    $breadcrumb->parent('dashboard.admins.index');
    $breadcrumb->push($admin->name, route('dashboard.admins.show', $admin));
});

Breadcrumbs::for('dashboard.admins.edit', function ($breadcrumb, $admin) {
    $breadcrumb->parent('dashboard.admins.show', $admin);
    $breadcrumb->push(trans('accounts::admins.actions.edit'), route('dashboard.admins.edit', $admin));
});
