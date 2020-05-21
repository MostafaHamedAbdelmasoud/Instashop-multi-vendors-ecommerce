<?php

Breadcrumbs::for('dashboard.home', function ($breadcrumb) {
    $breadcrumb->push(trans('dashboard::dashboard.home'), route('dashboard.home'));
});
