<?php

namespace Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire;

use Livewire\Component;
use Spatie\Mailcoach\Domain\Campaign\Models\Campaign;
use Spatie\Mailcoach\Http\App\Livewire\LivewireFlash;
use Spatie\Mailcoach\Domain\Campaign\Models\Concerns\HasHtmlContent;

class SaveButton extends Component
{
    use LivewireFlash;

    public $model;
    public $result;
    public $activeBlocks;

    protected $listeners = [
        'editorIsUpdated' => 'editorIsUpdated',
    ];

    public function editorIsUpdated($properties)
    {
        $this->result = $properties['result'];
        $this->activeBlocks = $properties['activeBlocks'];
    }

    public function mount(HasHtmlContent $model)
    {
        $this->model = $model;
    }

    public function save()
    {
        $this->model->setTemplateFieldValues([
            'html' => $this->result['rendered'],
            'json' => collect($this->activeBlocks)
                ->toJson()
        ]);

        $this->model->content($this->result['rendered']);

        $this->flash(__mc(':name was updated.', ['name' => $this->model->fresh()->name]));

        $this->emit('editorSaved');
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <x-mailcoach::button
                    @keydown.prevent.window.cmd.s="$wire.call('save')"
                    @keydown.prevent.window.ctrl.s="$wire.call('save')"
                    wire:click.prevent="save"
                    :label="__mc('Save')"
                />
            </div>
        blade;
    }
}
