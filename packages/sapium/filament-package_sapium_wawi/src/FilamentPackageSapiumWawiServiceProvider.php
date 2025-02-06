<?php

namespace Sapium\FilamentPackageSapiumWawi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

use App\Models\Product;
use Illuminate\Support\Facades\File;

class FilamentPackageSapiumWawiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $migrations = array_map(function (string $filename) {
            return basename($filename, '.php');
        }, glob(__DIR__ . '/../database/migrations/*.php'));

        $package
            ->name('filament-package_sapium_wawi')
            ->hasConfigFile('sapium_wawi')
            ->hasViews()
            ->hasTranslations()
            ->hasMigrations(
                ...$migrations
            )
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Hello, and welcome to the Wawi-Package!');
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
        $this->app->singleton('filament-package_sapium_wawi', function () {
            return new WawiPlugin();
        });
    }

    public function ecportToJson()
    {
        $products = Product::all();

        $jsonData = $products->toJson();

        $filePath = storage_path('app/public/exports.json');

        File::put($filePath, $jsonData);

        return respomse()->json([
            'message' => 'Data successfully exported',
            'file' => $filePath
        ]);

    }
}
