<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;

class ApexChartsHandler extends Command
{
    public function handle(): void
    {
        $this->comment('Installing filament-apex-charts plugin...');
        exec('composer require leandrocfe/filament-apex-charts:"^4.0"');
        $this->info('✅ filament-apex-charts plugin installed successfully.');
    }
}
