<?php

namespace Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire;

use Jeffreyvr\DropBlockEditor\Components\DropBlockEditor;
use Spatie\Mailcoach\Domain\Campaign\Models\Concerns\HasHtmlContent;

class Editor extends DropBlockEditor
{
    public HasHtmlContent $model;

    public function updateProperties(): array
    {
        return [
            'result' => $this->result,
            'model' => $this->model,
            'activeBlocks' => $this->activeBlocks,
        ];
    }

    public function render()
    {
        $this->process();

        if (! $this->initialRender) {
            $this->emit('editorIsUpdated', $this->updateProperties());
        }

        $this->initialRender = false;

        return view('dropblockeditor::editor', [
            'activeBlock' => $this->getActiveBlock()
        ]);
    }
}
