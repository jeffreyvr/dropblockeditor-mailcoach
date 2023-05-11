<?php

namespace Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire;

use Livewire\Component;
use Spatie\Mailcoach\Domain\Campaign\Models\Concerns\HasHtmlContent;
use Spatie\Mailcoach\Http\App\Livewire\LivewireFlash;

class EditorPlaceholder extends Component
{
    use LivewireFlash;

    public HasHtmlContent $model;

    public int|string|null $templateId = null;

    public function mount(HasHtmlContent $model)
    {
        if ($model->hasTemplates()) {
            $this->template = $model->template;
            $this->templateId = $model->template?->id;
        }
    }

    public function save()
    {
        $this->model->update([
            'template_id' => $this->templateId,
        ]);

        $this->flash(__mc(':name was updated.', ['name' => $this->model->fresh()->name]));

        $this->emit('editorSaved');
    }

    public function render()
    {
        return <<<'blade'
        <div class="form-grid">
            @if ($model->hasTemplates())
                <x-mailcoach::template-chooser />
            @endif

            <div><a href="{{ route('mailcoach.dropblockeditor.editor', $model) }}" class="button py-3">Open editor</a></div>

            <x-mailcoach::form-buttons>
                <x-mailcoach::button
                    @keydown.prevent.window.cmd.s="$wire.call('save')"
                    @keydown.prevent.window.ctrl.s="$wire.call('save')"
                    wire:click.prevent="save"
                    :label="__mc('Save')"
                />
            </x-mailcoach::form-buttons>
        </div>
        blade;
    }
}
