<?php

namespace Softok2\FilamentStarterKit;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Softok2\FilamentStarterKit\Commands\FilamentStarterKitCommand;

class FilamentStarterKitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-starter-kit')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament_starter_kit_table')
            ->hasCommand(FilamentStarterKitCommand::class);
    }
}
