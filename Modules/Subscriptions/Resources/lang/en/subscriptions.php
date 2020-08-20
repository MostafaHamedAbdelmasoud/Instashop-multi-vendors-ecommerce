<?php

return [
    'plural' => 'Subscriptions',
    'singular' => 'Subscription',
    'empty' => 'There are no categories',
    'select' => 'Select Subscription',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List all',
        'show' => 'Show Subscription',
        'create' => 'Create a new subscription for store',
        //it's for a shipping company only
        'create_shipping_company' => 'Create a new subscription for shipping',
        //
        'new' => 'New',
        'edit' => 'Edit Subscription',
        'delete' => 'Delete Subscription',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The subscription has been created successfully.',
        'updated' => 'The subscription has been updated successfully.',
        'deleted' => 'The subscription has been deleted successfully.',
    ],
    'attributes' => [
        'model_type' => ' Type',
        'model_id_shipping_company' => 'Shipping Company',
        'model_id' => 'Model Id',
        'start_at' => 'Start Date',
        'end_at' => 'End Date',
        'paid_amount' => 'Paid Amount',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the subscription ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
    'additions' => [
        'model_name' => 'Model Name',
        'shipping_company' => 'Shipping Company',
        'store' => 'Store',
    ],
];
