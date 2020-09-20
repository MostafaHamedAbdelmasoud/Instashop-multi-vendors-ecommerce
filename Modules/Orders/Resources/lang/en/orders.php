<?php

return [
    'plural' => 'Orders',
    'singular' => 'Orders',
    'empty' => 'There are no orders',
    'select' => 'Select Orders',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List all',
        'show' => 'Show Orders',
        'create' => 'Create a new orders',
        'new' => 'New',
        'edit' => 'Edit Orders',
        'delete' => 'Delete Orders',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The orders has been created successfully.',
        'updated' => 'The orders has been updated successfully.',
        'deleted' => 'The orders has been deleted successfully.',
    ],
    'attributes' => [
        'id' => 'Id',
        'user_id' => 'User Name',
        'address_id' => 'Address  ',
        'shipping_company_id' => 'Shipping Company',
        'coupon_id' => ' Coupon',
        'shipping_company_notes' => 'Shipping Company Notes',
        'subtotal' => ' Subtotal ',
        'total' => 'Total',
        'discount' => 'Discount ',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the orders ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
