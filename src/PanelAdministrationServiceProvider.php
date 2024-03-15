<?php

namespace Paneladministration\PanelAdministration;

use Paneladministration\PanelAdministration\Commands\PanelAdministrationCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PanelAdministrationServiceProvider extends PackageServiceProvider
{
<<<<<<< HEAD
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'PanelAdministration');
    }

=======
>>>>>>> beb851ade8fcc364ef5806fcd18b627298aaf044
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('panel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_panel_administration_table')
            ->hasCommand(PanelAdministrationCommand::class);
    }
}
