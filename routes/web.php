<?php


use Binomedev\Portfolio\Http\Controllers\{CategoriesController, ProjectsController};
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'portfolio.', 'prefix' => 'portfolio', 'middleware' => ['web']], function() {
    
    Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
    Route::get('/projects/{project:slug}', [ProjectsController::class, 'show'])->name('projects.show');

    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category:slug}', [CategoriesController::class, 'show'])->name('categories.show');
});


