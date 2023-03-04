<?php

namespace Ibnnajjaar\Graphify\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Ibnnajjaar\Graphify\GraphifyServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Ibnnajjaar\\Graphify\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            GraphifyServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_graphify_table.php.stub';
        $migration->up();
        */
    }
}
