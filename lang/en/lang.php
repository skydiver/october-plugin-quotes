<?php

return [

    'plugin' => [
        'name'        => 'Quotes Carousel',
        'description' => 'Displays a Quote Carousel using Bootstrap'
    ],

    'navigation' => [
        'label' => 'Quotes',
        'sideMenu' => [
            'items' => 'Quotes List'
        ]
    ],

    'controller' => [
        'view' => [
            'items' => [
                'new'                 => 'New Item',
                'breadcrumb_label'    => 'Items',
                'return'              => 'Return to items list',
                'creating'            => 'Creating Item...',
                'delete_confirmation' => 'Do you really want to delete this item?'
            ]
        ],
        'list' => [
            'items' => 'Manage Items',
        ],
        'form' => [
            'items' => [
                'title'       => 'Item',
                'create'      => 'Create Item',
                'update'      => 'Update Item',
                'flashCreate' => 'The Item has been created successfully',
                'flashUpdate' => 'The Item has been updated successfully',
                'flashDelete' => 'The Item has been deleted successfully'
            ]
        ]
    ],

    'columns' => [
        'item' => [
            'image'  => 'Image',
            'quote'  => 'Quote',
            'author' => 'Author'
        ]
    ],

    'fields' => [
        'item' => [
            'quote'  => 'Quote',
            'author' => 'Author',
            'link'   => 'Link',
            'image'  => 'Image'
        ]
    ],

    'components' => [
        'quotes' => [
            'name'            => 'Quotes Carousel',
            'description'     => 'Adds a Quotes Carousel in page.',
            'interval_title'  => 'Interval',
            'interval_desc'   => 'Time to delay between cycling an item',
            'pause_title'     => 'Pause',
            'pause_desc'      => 'Pause on mouseover',
            'random_title'    => 'Random',
            'random_desc'     => 'Display just a single random quote',
            'jquery_title'    => 'Load jQuery?',
            'bootstrap_title' => 'Load Bootstrap?',
            'fa_title'        => 'Load Font Awesome?',
        ],
    ]

];