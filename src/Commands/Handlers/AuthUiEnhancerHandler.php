<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;

class AuthUiEnhancerHandler extends Command
{
    public function handle(): void
    {
        $this->comment('Installing filament-auth-ui-enhancer plugin...');
        exec('composer require diogogpinto/filament-auth-ui-enhancer');
        $this->info('✅ filament-auth-ui-enhancer plugin installed successfully.');
    }

}
