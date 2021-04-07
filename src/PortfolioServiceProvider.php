<?php

namespace Binomedev\Portfolio;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasRoute('web')
            ->hasTranslations()
            ->hasMigrations(['create_portfolio_categories_table', 'create_portfolio_projects_table']);


        $this->app->singleton(Portfolio::class);
    }

    public function packageBooted()
    {
        Blade::componentNamespace('Binomedev\\Portfolio\\View\\Components', $this->package->shortName());

        Nova::resources(PortfolioFacade::resources());

        if($this->app->runningInConsole()){
            $this->publishes([
                $this->package->basePath("/../routes/web.php") => base_path("routes/{$this->package->shortName()}.php"),
            ], "{$this->package->shortName()}-routes");
        }
    }
}
