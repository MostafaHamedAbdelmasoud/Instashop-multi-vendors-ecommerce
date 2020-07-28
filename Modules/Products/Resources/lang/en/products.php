<?php

return [
    'plural' => 'Products',
    'singular' => 'Product',
    'empty' => 'There are no categories',
    'select' => 'Select Product',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List all',
        'show' => 'Show Product',
        'create' => 'Create a new product',
        'new' => 'New',
        'edit' => 'Edit Product',
        'delete' => 'Delete Product',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The product has been created successfully.',
        'updated' => 'The product has been updated successfully.',
        'deleted' => 'The product has been deleted successfully.',
    ],
    'attributes' => [
        'name' => 'Name',
        'category_id' => ' Category ',
        'code' => 'Code',
        'store_id' => 'Store',
        'description' => ' Description',
        'meta_description' => ' Meta Description ',
        'price' => ' Price ',
        'old_price' => ' Old Price ',
        'weight' => ' Weight',
        'stock' => ' Stock',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the product ?',
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
