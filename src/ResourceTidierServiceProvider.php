<?php

namespace R4nkt\ResourceTidier;

use R4nkt\ResourceTidier\Commands\Tidy;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ResourceTidierServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-resource-tidier')
            ->hasConfigFile()
            ->hasCommands([
                Tidy::class,
            ]);
    }

    public function registeringPackage()
    {
        $this->app->bind('resource-tidier', function () {
            return new ResourceTidier();
        });
    }
}
