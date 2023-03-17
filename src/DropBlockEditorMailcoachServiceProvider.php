<?php

namespace Jeffreyvr\DropBlockEditorMailcoach;

use Illuminate\Support\Facades\Route;
use Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire\Editor;
use Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire\PreEditor;
use Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire\SaveButton;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DropBlockEditorMailcoachServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('dropblockeditor-mailcoach')
            ->hasViews()
            ->hasConfigFile();
    }

    public function bootingPackage()
    {
        $middlewareClasses = config('mailcoach.middleware.web', []);

        Route::middleware($middlewareClasses)->prefix('')->group(__DIR__ . '/../routes/web.php');

        Livewire::component('dropblockeditor-mailcoach::minimal', PreEditor::class);
        Livewire::component('dropblockeditor-mailcoach::editor', Editor::class);
        Livewire::component('dropblockeditor-mailcoach::save-button', SaveButton::class);
    }
}
