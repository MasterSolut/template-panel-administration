<?php

namespace Paneladministration\PanelAdministration;

use Paneladministration\PanelAdministration\Commands\PanelAdministrationCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PanelAdministrationServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'PanelAdministration');
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('panel-administration')
            ->hasConfigFile('panel')
            ->hasViews()
            ->hasMigration('create_panel_administration_table')
            ->hasCommand(PanelAdministrationCommand::class);
    }
}
