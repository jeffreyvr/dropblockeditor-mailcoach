<?php

namespace Jeffreyvr\DropBlockEditorMailcoach\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Jeffreyvr\DropBlockEditorMailcoach\DropBlockEditorMailcoachServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

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
            LivewireServiceProvider::class,
            DropBlockEditorServiceProvider::class,
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
