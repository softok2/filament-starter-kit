<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class PintHandler extends Command
{
    public function handle(): void
    {
        $this->comment('Installing Laravel Pint...');
        exec('composer require laravel/pint --dev');
        $this->info('✅ Laravel Pint installed successfully!');

        try {
            $this->copyConfig();
        } catch (FileNotFoundException $e) {
            $this->error('❌ Failed to copy pint.json: '.$e->getMessage());
        }

    }

    /**
     * @throws FileNotFoundException
     */
    private function copyConfig(): void
    {
        $stubPath = dirname(__DIR__, 3).'/stubs/pint.json.stub';

        $destination = base_path('pint.json');

        if (! File::exists($destination)) {
            $stubContent = File::get($stubPath);

            File::put($destination, $stubContent);

            $this->info('✅ pint.json created from stub!');
        } else {
            $this->warn('⚠️ pint.json already exists, skipping creation.');
        }
    }
}
