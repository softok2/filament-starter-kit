<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;

class DebugBarHandler extends Command
{

    public function handle(): void
    {
        $this->comment('Installing Laravel Debugbar...');
        exec('composer require barryvdh/laravel-debugbar --dev');
        $this->info('✅ Laravel Debugbar installed successfully.');
    }
}
