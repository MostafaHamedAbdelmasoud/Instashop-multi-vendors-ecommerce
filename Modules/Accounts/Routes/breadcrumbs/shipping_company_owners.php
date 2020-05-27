<?php

Breadcrumbs::for('dashboard.shipping_company_owners.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('accounts::shipping_company_owners.plural'), route('dashboard.shipping_company_owners.index'));
});

Breadcrumbs::for('dashboard.shipping_company_owners.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.shipping_company_owners.index');
    $breadcrumb->push(trans('accounts::shipping_company_owners.actions.create'), route('dashboard.shipping_company_owners.create'));
});

Breadcrumbs::for('dashboard.shipping_company_owners.show', function ($breadcrumb, $shippingCompanyOwner) {
    $breadcrumb->parent('dashboard.shipping_company_owners.index');
    $breadcrumb->push($shippingCompanyOwner->name, route('dashboard.shipping_company_owners.show', $shippingCompanyOwner));
});

Breadcrumbs::for('dashboard.shipping_company_owners.edit', function ($breadcrumb, $shippingCompanyOwner) {
    $breadcrumb->parent('dashboard.shipping_company_owners.show', $shippingCompanyOwner);
    $breadcrumb->push(trans('accounts::shipping_company_owners.actions.edit'), route('dashboard.shipping_company_owners.edit', $shippingCompanyOwner));
});
