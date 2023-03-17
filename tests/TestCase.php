<?php

namespace Jeffreyvr\DropBlockEditorMailcoach\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Jeffreyvr\DropBlockEditorMailcoach\DropBlockEditorMailcoachServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Jeffreyvr\\DropBlockEditorMailcoach\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            DropBlockEditorMailcoachServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_dropblockeditor-mailcoach_table.php.stub';
        $migration->up();
        */
    }
}
