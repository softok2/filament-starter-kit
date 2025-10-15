<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TelescopeHandler extends Command
{
    public function handle(): void
    {
        $this->comment('Installing Telescope...');
        exec('composer require laravel/telescope');

        if (! $this->checkIfMigrationExists()) {
            $this->call('telescope:install');
        } else {
            $this->warn('⚠️ Telescope migration already exists. Skipping create migration step.');
        }

        $this->info('✅ Telescope installed successfully.');
    }

    private function checkIfMigrationExists(): bool
    {
        $migrationsPath = database_path('migrations');
        $pattern = '*_create_telescope_entries_table.php';

        return count(File::glob($migrationsPath.'/'.$pattern));
    }
}
