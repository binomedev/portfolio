<?php

namespace Binomedev\Portfolio;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Binomedev\Portfolio\Commands\PortfolioCommand;

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
            ->hasMigration('create_portfolio_table')
            ->hasCommand(PortfolioCommand::class);
    }
}
