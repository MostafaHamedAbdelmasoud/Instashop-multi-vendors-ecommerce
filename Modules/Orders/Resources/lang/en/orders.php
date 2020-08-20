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
        'name' => 'Name',
        'category_id' => ' Category ',
        'code' => 'Code',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the orders ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
    'units' => [
        'gram' => 'Gram',
        'kilo_gram' => 'Kilo Gram',
        'piece' => 'Piece',
    ],
];
