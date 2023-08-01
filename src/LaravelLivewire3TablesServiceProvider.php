<?php

namespace Rochi88\LaravelLivewire3Tables;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rochi88\LaravelLivewire3Tables\Commands\MakeTablesCommand;

class LaravelLivewire3TablesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-livewire3-tables')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(MakeTablesCommand::class);
    }
}
