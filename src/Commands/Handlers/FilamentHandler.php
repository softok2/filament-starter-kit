<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;

class FilamentHandler extends Command
{
    public function handle(): void
    {
        // Installing filament panels + custom theme
        $this->comment('Installing Filament Panels + Custom Theme...');
        exec('composer require filament/filament:"^4.0"');
        $this->call('filament:install', ['--panels' => true]);
        $this->call('make:filament-theme');
        $this->info('✅ Filament Panels + Custom Theme installed successfully!');
    }
}
