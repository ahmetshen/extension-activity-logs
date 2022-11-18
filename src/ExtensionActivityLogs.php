<?php

namespace AhmetShen\ExtensionActivityLogs;

class ExtensionActivityLogs
{
    /**
     * The package name.
     *
     * @var string
     */
    const NAME = 'extension-activity-logs';

    /**
     * The package version.
     *
     * @var string
     */
    const VERSION = '0.1.0';

    /**
     * Get the name of the package.
     *
     * @return string
     */
    public function packageName(): string
    {
        return static::NAME;
    }

    /**
     * Get the version number of the package.
     *
     * @return string
     */
    public function packageVersion(): string
    {
        return static::VERSION;
    }

    /**
     * The config value.
     *
     * @param string $configKeyName
     * @return mixed
     */
    public function configValue(string $configKeyName): mixed
    {
        return config($this->packageName().'.'.$configKeyName);
    }
}
