<?php

namespace Jeffreyvr\DropBlockEditorMailcoach;

use Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire\EditorPlaceholder;
use Spatie\Mailcoach\Domain\Settings\Support\EditorConfiguration\Editors\EditorConfigurationDriver;

class DropBlockEditorConfigurationDriver extends EditorConfigurationDriver
{
    public static function label(): string
    {
        return 'DropBlock';
    }

    public function getClass(): string
    {
        return EditorPlaceholder::class;
    }
}
