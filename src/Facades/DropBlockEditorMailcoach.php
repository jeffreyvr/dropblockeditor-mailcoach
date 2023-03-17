<?php

namespace Jeffreyvr\DropBlockEditorMailcoach\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jeffreyvr\DropBlockEditorMailcoach\DropBlockEditorMailcoach
 */
class DropBlockEditorMailcoach extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Jeffreyvr\DropBlockEditorMailcoach\DropBlockEditorMailcoach::class;
    }
}
