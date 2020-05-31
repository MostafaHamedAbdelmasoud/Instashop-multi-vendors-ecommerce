<?php

Breadcrumbs::for('dashboard.store_owners.stores.edit', function ($breadcrumb, $storeOwner, $store) {
    $breadcrumb->parent('dashboard.store_owners.show', $storeOwner);
    $breadcrumb->push(trans('accounts::stores.actions.edit'), route('dashboard.store_owners.stores.edit', [$storeOwner, $store]));
});
