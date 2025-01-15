<?php

namespace Sapium\FilamentPackageSapiumCart;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

class FilamentPackageSapiumCartServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $migrations = array_map(function (string $filename) {
            return basename($filename, '.php');
        }, glob(__DIR__ . '/../database/migrations/*.php'));

        $package
            ->name('filament-package_sapium_cart')
            ->hasConfigFile('sapium_cart')
            ->hasViews()
            ->hasTranslations()
            ->hasMigrations(
                ...$migrations
            )
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Hello, and welcome to the Cart-Package!');
                    })
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->copyAndRegisterServiceProviderInApp()
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Have a great day!');
                    });
            });
    }

    public function packageRegistered(): void
    {
        $this->app->singleton('filament-package_sapium_cart', function () {
            return new CartPlugin();
        });
    }
}
