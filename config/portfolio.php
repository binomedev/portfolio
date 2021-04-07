<?php

return [
    'models' => [
        'project' =>  \Binomedev\Portfolio\Models\Project::class,
        'category' =>  \Binomedev\Portfolio\Models\Category::class,
    ],

    'resources' => [
        'project' =>  \Binomedev\Portfolio\Nova\Project::class,
        'category' =>  \Binomedev\Portfolio\Nova\Category::class,
    ],

    'controllers' => [
        'project' => \Binomedev\Portfolio\Http\Controllers\ProjectsController::class,
        'category' => \Binomedev\Portfolio\Http\Controllers\CategoriesController::class,
    ],


    'options' => [
        'categories' => [
            'routes' => false,
            'nova' => true,
        ],

        'projects' => [
            'routes' => true,
            'nova' => true,
        ],
    ],
];
