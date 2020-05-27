<?php

Breadcrumbs::for('dashboard.shipping_company_owners.shipping_companies.edit', function ($breadcrumb, $shippingCompanyOwner, $shippingCompany) {
    $breadcrumb->parent('dashboard.shipping_company_owners.show', $shippingCompanyOwner);
    $breadcrumb->push(trans('accounts::shipping_companies.actions.edit'), route('dashboard.shipping_company_owners.shipping_companies.edit', [$shippingCompanyOwner, $shippingCompany]));
});
