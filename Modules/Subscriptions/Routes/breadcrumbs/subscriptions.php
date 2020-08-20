<?php

Breadcrumbs::for('dashboard.subscriptions.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('subscriptions::subscriptions.plural'), route('dashboard.subscriptions.index'));
});

Breadcrumbs::for('dashboard.subscriptions.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.subscriptions.index');
    $breadcrumb->push(trans('subscriptions::subscriptions.actions.create'), route('dashboard.subscriptions.create'));
});


Breadcrumbs::for('dashboard.create_shipping_company', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.subscriptions.index');
    $breadcrumb->push(trans('subscriptions::subscriptions.actions.create_shipping_company'), route('dashboard.create_shipping_company'));
});


Breadcrumbs::for('dashboard.subscriptions.show', function ($breadcrumb, $subscription) {
    $breadcrumb->parent('dashboard.subscriptions.index');
    $breadcrumb->push($subscription->get_model()->name, route('dashboard.subscriptions.show', $subscription));
});

Breadcrumbs::for('dashboard.subscriptions.edit', function ($breadcrumb, $subscription) {
    $breadcrumb->parent('dashboard.subscriptions.show', $subscription);
    $breadcrumb->push(trans('subscriptions::subscriptions.actions.edit'), route('dashboard.subscriptions.edit', $subscription));
});
