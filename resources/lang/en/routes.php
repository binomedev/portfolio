<?php
return [

    'prefix' => 'portfolio',

    'projects' => [
        'index' => '/projects',
        'show' => '/projects/{project:slug}',
    ],

    'categories' => [
        'index' => '/categories',
        'show' => '/categories/{category:slug}',
    ],
];
