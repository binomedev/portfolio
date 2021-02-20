<?php

namespace Binomedev\Portfolio;

use Binomedev\Portfolio\Nova\Category;
use Binomedev\Portfolio\Nova\Project;
use Illuminate\Support\Facades\Blade;
use Laravel\Nova\Nova;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PortfolioServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('portfolio')
            // ->hasConfigFile()
            ->hasViews()
            ->hasRoute('web')
            ->hasMigrations(['create_portfolio_categories_table', 'create_portfolio_projects_table']);
    }

    public function packageBooted()
    {
        Blade::componentNamespace('Binomedev\\Portfolio\\View\\Components', $this->package->shortName());

        Nova::resources([
            Category::class,
            Project::class,
        ]);
    }
}
