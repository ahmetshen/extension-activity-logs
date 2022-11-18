<?php

namespace AhmetShen\ExtensionActivityLogs;

use Illuminate\Support\Facades\Facade;

class ExtensionActivityLogsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'extension-activity-logs';
    }
}
