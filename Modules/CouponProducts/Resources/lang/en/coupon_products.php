<?php

return [
    'plural' => 'Private Coupons',
    'singular' => 'Private Coupon',
    'empty' => 'There are no private coupons',
    'select' => 'Select Private Coupon',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List all',
        'show' => 'Show Private Coupon',
        'create' => 'Create a new for product coupon',
        // create category
        'create_coupon_category' => 'Create a new for category coupon',
        //
        'new' => 'New',
        'edit' => 'Edit Private Coupon',
        'delete' => 'Delete Private Coupon',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The private coupon has been created successfully.',
        'updated' => 'The private coupon has been updated successfully.',
        'deleted' => 'The private coupon has been deleted successfully.',
    ],
    'attributes' => [
        'model_type' => 'Model Type',
        'coupon_id' => 'Coupon Code',
        'model_id' => 'Coupon Name',
        'type' => 'Status',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the private coupon ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
    'additions' =>[
        'category' => 'Category',
        'product' => 'Product',
        'included' => 'Included',
        'excluded' => 'Excluded',
    ],
];
