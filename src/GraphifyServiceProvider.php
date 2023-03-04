<?php

namespace Ibnnajjaar\Graphify;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GraphifyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('graphify')
            ->hasConfigFile()
            ->hasViews();
    }
}
