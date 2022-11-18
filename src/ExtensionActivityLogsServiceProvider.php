<?php

namespace AhmetShen\ExtensionActivityLogs;

use Illuminate\Support\ServiceProvider;

class ExtensionActivityLogsServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/extension-activity-logs.php', 'extension-activity-logs');

        // Register the main class to use with the facade
        $this->app->singleton('extension-activity-logs', function () {
            return new ExtensionActivityLogs;
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        // Registering package commands
        $this->commands([
            Console\InstallCommand::class,
        ]);
    }
}
