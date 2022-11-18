<?php

namespace AhmetShen\ExtensionActivityLogs\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'extensionActivityLogs:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the extensionActivityLogs Components and Resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        // Config File(s)...
        $this->configFiles();

        // Database Files...
        $this->databaseFiles();

        $this->info('extensionActivityLogs scaffolding installed successfully.');

        $this->comment('The installation process was carried out successfully. Please visit your web page.');
    }

    /**
     * Config Files.
     *
     * @return void
     */
    protected function configFiles(): void
    {
        (new Filesystem)->copy(__DIR__.'/../../config/extension-activity-logs.php', config_path('extension-activity-logs.php'));
    }

    /**
     * Database Files.
     *
     * @return void
     */
    protected function databaseFiles(): void
    {
        $this->migrationFiles();
    }

    /**
     * Migration Files.
     *
     * @return void
     */
    protected function migrationFiles(): void
    {
        $migrationFiles = (new Filesystem)->allFiles(__DIR__.'/../../resources/stubs/database/migrations');

        foreach ($migrationFiles as $migrationFile) {
            $fileName = Str::beforeLast($migrationFile->getFilename(), '.stub');

            if ((new Filesystem)->exists(database_path('migrations/'.$fileName.'.php'))) {
                (new Filesystem)->delete(database_path('migrations/'.$fileName.'.php'));
            }

            (new Filesystem)->copy(__DIR__.'/../../resources/stubs/database/migrations/'.$fileName.'.stub', database_path('migrations/'.$fileName.'.php'));

            unset($migrationFile);
        }
    }
}
