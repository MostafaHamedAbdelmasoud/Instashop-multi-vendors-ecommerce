<?php

return [
    'plural' => 'Order Products',
    'singular' => 'Order Product',
    'empty' => 'There are no order products',
    'select' => 'Select Order Product',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List all',
        'show' => 'Show Order Product',
        'create' => 'Create a new order product',
        'new' => 'New',
        'edit' => 'Edit Order Product',
        'delete' => 'Delete Order Product',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The order product has been created successfully.',
        'updated' => 'The order product has been updated successfully.',
        'deleted' => 'The order product has been deleted successfully.',
    ],
    'attributes' => [
        'order_id' => 'Order',
        'product_id' =>' Product',
        'quantity' => 'Quantity',
        'total' => 'Total',
        'price' =>' Price ',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the order product ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
    'additions'=>[
        'duplicate' => 'this product is already existed in order',
    ],
];
