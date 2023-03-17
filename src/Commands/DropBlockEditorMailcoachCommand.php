<?php

namespace Jeffreyvr\DropBlockEditorMailcoach\Commands;

use Illuminate\Console\Command;

class DropBlockEditorMailcoachCommand extends Command
{
    public $signature = 'dropblockeditor-mailcoach';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
