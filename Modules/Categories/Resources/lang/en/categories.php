<?php

return [
    'plural' => 'Categories',
    'singular' => 'Category',
    'empty' => 'There are no categories',
    'select' => 'Select Category',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List all',
        'show' => 'Show Category',
        'create' => 'Create a new category',
        'new' => 'New',
        'edit' => 'Edit Category',
        'delete' => 'Delete Category',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The category has been created successfully.',
        'updated' => 'The category has been updated successfully.',
        'deleted' => 'The category has been deleted successfully.',
    ],
    'attributes' => [
        'name' => 'Category Name',
        'parent_id' => 'Parent Category',
        'store_id' => 'Store Name',
        'published_at' => 'Published At ',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the category ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
