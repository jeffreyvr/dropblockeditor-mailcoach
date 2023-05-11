<?php

namespace Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire;

use Jeffreyvr\DropBlockEditor\Components\DropBlockEditor;
use Spatie\Mailcoach\Domain\Campaign\Models\Concerns\HasHtmlContent;

class Editor extends DropBlockEditor
{
    public HasHtmlContent $model;

    public function updateProperties(): array
    {
        $properties = parent::updateProperties();

        $properties['model'] = $this->model;

        return $properties;
    }
}
