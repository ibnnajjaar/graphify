<?php

namespace Ibnnajjaar\Graphify;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ibnnajjaar\Graphify\Commands\GraphifyCommand;

class GraphifyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('graphify')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_graphify_table')
            ->hasCommand(GraphifyCommand::class);
    }
}
