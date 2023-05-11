<?php

namespace Jeffreyvr\DropBlockEditorMailcoach\Http\Controllers;

use Spatie\Mailcoach\Domain\Campaign\Models\Concerns\HasHtmlContent;

class RenderEditorController
{
    public function __invoke(HasHtmlContent $model)
    {
        $html = json_decode($model->structured_html, true);

        $activeBlocks = [];

        if (! empty($html['templateValues']['json'])) {
            $activeBlocks = json_decode($html['templateValues']['json'], true);
        }

        $base = 'dropblockeditor::base';

        if ($model->template) {
            $base = str_replace('[[[content]]]', '{!! $slot !!}', $model->template->getHtml());
        }

        return view('dropblockeditor-mailcoach::editor', [
            'title' => "$model->name | Editor",
            'model' => $model,
            'html' => $html,
            'activeBlocks' => $activeBlocks,
            'base' => $base,
        ]);
    }
}
