<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;

class SpatieMediaLibraryHandler extends Command
{

    public function handle(): void
    {
        // Installing filament spatie media library and Publishing the config file
        $this->comment('Installing spatie media library and Publishing the config file...');
        exec('composer require filament/spatie-laravel-media-library-plugin:"^4.0" -W');
        $this->call('vendor:publish', [
                '--provider' => "Spatie\MediaLibrary\MediaLibraryServiceProvider",
                '--tag' => 'medialibrary-migrations'
            ]
        );

        $this->info('✅ Spatie media library installed and config file published successfully.');
    }

}
