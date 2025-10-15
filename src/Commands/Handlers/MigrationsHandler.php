<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;

class MigrationsHandler extends Command
{
    public function handle(): void
    {
        $this->comment('Running migrations...');

        $this->call('migrate', ['--force' => true]);
    }
}
