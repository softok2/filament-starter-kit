<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;

class LucideIconsHandler extends Command
{
    public function handle()
    {
        $this->comment('Installing filament-lucide-icons plugin...');
        exec('composer require codewithdennis/filament-lucide-icons');
        $this->info('✅ filament-lucide-icons plugin installed successfully.');
    }
}
