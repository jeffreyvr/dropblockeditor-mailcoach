<?php

use Jeffreyvr\DropBlockEditorMailcoach\Http\Controllers\RenderEditorController;

Route::get('mailcoach/campaigns/{campaign}/editor', RenderEditorController::class)
    ->name('mailcoach.dropblockeditor.editor');
