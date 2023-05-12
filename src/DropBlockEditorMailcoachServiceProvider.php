<?php

namespace Jeffreyvr\DropBlockEditorMailcoach;

use Illuminate\Support\Facades\Route;
use Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire\Editor;
use Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire\EditorPlaceholder;
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

        $editorButtons = config('dropblockeditor.buttons', []);

        if (config('dropblockeditor-mailcoach.show_default_save_button', true)) {
            $editorButtons[] = 'dropblockeditor-mailcoach::save-button';
        }

        config()->set('dropblockeditor.buttons', array_unique($editorButtons));

        Route::middleware($middlewareClasses)->prefix('')->group(__DIR__.'/../routes/web.php');

        Livewire::component('dropblockeditor-mailcoach::minimal', EditorPlaceholder::class);
        Livewire::component('dropblockeditor-mailcoach::editor', Editor::class);
        Livewire::component('dropblockeditor-mailcoach::save-button', SaveButton::class);
    }
}
