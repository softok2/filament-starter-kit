<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class FilamentHandler extends Command
{
    public function handle(): void
    {
        // Installing filament panels + custom theme
        $this->comment('Installing Filament Panels + Custom Theme...');
        exec('composer require filament/filament:"^4.0"');
        $this->call('filament:install', ['--panels' => true]);
        $this->call('make:filament-theme');

        try {
            $this->copyTheme();
        } catch (FileNotFoundException $e) {
            $this->error('❌ Failed to copy custom theme: '.$e->getMessage());

            return;
        }

        $this->info('✅ Filament Panels + Custom Theme installed successfully!');
    }

    /**
     * @throws FileNotFoundException
     */
    private function copyTheme(): void
    {
        $stubPath = dirname(__DIR__, 3).'/stubs/filament-theme.css.stub';

        $destination = base_path('resources/css/filament/admin/theme.css');

        $stubContent = File::get($stubPath);

        File::put($destination, $stubContent);
    }
}
