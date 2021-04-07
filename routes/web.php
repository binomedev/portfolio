<?php


use Binomedev\Portfolio\PortfolioFacade;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'portfolio.', 'prefix' => trans('portfolio::routes.prefix'), 'middleware' => ['web']], function () {

    if(config('portfolio.options.projects.routes')){
        $projectsController = PortfolioFacade::controllers('project');
        Route::get(trans('portfolio::routes.projects.index'), [$projectsController, 'index'])->name('projects.index');
        Route::get(trans('portfolio::routes.projects.show'), [$projectsController, 'show'])->name('projects.show');
    }

    if(config('portfolio.options.categories.routes')){
        $categoriesController = PortfolioFacade::controllers('category');
        Route::get(trans('portfolio::routes.categories.index'), [$categoriesController, 'index'])->name('categories.index');
        Route::get(trans('portfolio::routes.categories.show'), [$categoriesController, 'show'])->name('categories.show');
    }

});


