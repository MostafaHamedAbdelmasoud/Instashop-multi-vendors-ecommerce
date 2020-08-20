<?php

return [
    'plural' => 'Coupons',
    'singular' => 'Coupon',
    'empty' => 'There are no coupons',
    'select' => 'Select Coupon',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List all',
        'show' => 'Show Coupon',
        'create' => 'Create a new coupon',
        'new' => 'New',
        'edit' => 'Edit Coupon',
        'delete' => 'Delete Coupon',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The coupon has been created successfully.',
        'updated' => 'The coupon has been updated successfully.',
        'deleted' => 'The coupon has been deleted successfully.',
    ],
    'attributes' => [
        'code' => 'Code',
        'fixed_discount' => 'Fixed Discount',
        'percentage_discount' => 'Percentage Discount',
        'max_usage_per_order' => 'Max Usage Per Order',
        'max_usage_per_user' => 'Max Usage Per User',
        'min_total' => 'Min Total',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the coupon ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
