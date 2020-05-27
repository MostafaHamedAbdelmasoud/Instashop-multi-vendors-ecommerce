<?php

Breadcrumbs::for('dashboard.customers.addresses.edit', function ($breadcrumb, $customer, $address) {
    $breadcrumb->parent('dashboard.customers.show', $customer);
    $breadcrumb->push(trans('accounts::addresses.actions.edit'), route('dashboard.customers.addresses.edit', [$customer, $address]));
});
