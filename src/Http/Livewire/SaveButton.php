<?php

namespace Jeffreyvr\DropBlockEditorMailcoach\Http\Livewire;

use Jeffreyvr\DropBlockEditor\Parsers\Parse;
use Livewire\Component;
use Spatie\Mailcoach\Http\App\Livewire\LivewireFlash;

class SaveButton extends Component
{
    use LivewireFlash;

    public $model;

    public $properties;

    protected $listeners = [
        'editorIsUpdated' => 'editorIsUpdated',
    ];

    public function editorIsUpdated($properties)
    {
        $this->properties = $properties;
    }

    public function mount($properties)
    {
        $this->model = $properties['model'];
    }

    public function save()
    {
        $rendered = Parse::execute([
            'activeBlocks' => $this->properties['activeBlocks'],
            'base' => $this->properties['base'],
            'context' => 'rendered',
            'parsers' => $this->properties['parsers'],
        ]);

        $this->model->setTemplateFieldValues([
            'html' => $rendered,
            'json' => collect($this->properties['activeBlocks'])
                ->toJson(),
        ]);

        $this->model->content($rendered);

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
