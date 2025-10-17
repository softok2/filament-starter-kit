<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;

class EasyFooterHandler extends Command
{
    public function handle(): void
    {
        $this->comment('Installing Easy Footer...');
        exec('composer require devonab/filament-easy-footer:^2.0');
        $this->info('✅ Easy Footer installed successfully.');
    }
}
