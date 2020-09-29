<?php

return [
    'plural' => 'Order Product Field Values',
    'singular' => 'Order Product Field Value',
    'empty' => 'There are no order product field values',
    'select' => 'Select Order Product Field Value',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List all',
        'show' => 'Show Order Product Field Value',
        'create' => 'Create a new order product field value',
        'new' => 'New',
        'edit' => 'Edit Order Product Field Value',
        'delete' => 'Delete Order Product Field Value',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The order product field value has been created successfully.',
        'updated' => 'The order product field value has been updated successfully.',
        'deleted' => 'The order product field value has been deleted successfully.',
    ],
    'attributes' => [
        'option_id' => 'Option',
        'order_product_id' =>'Order Product',
        'custom_field_id' => 'Custom Field',
        'value' => 'Value',
        'additional_price' =>'Additional Price',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the order product field value ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
    'additions'=>[
        'duplicate' => 'this product is already existed in order',
    ],
];
