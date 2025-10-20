<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class EasyFooterHandler extends Command
{
    public function handle(): void
    {
        $this->comment('Installing Easy Footer...');
        exec('composer require devonab/filament-easy-footer:^2.0');
        $this->copyLogo();
        $this->info('✅ Easy Footer installed successfully.');
    }


    /**
     */
    private function copyLogo(): void
    {
        $logoPath = dirname(__DIR__, 3).'/resources/images/softok2_logo.png';

        $targetDir = base_path('resources/images');
        $targetPath = $targetDir.'/softok2_logo.png';

        // Ensure the destination directory exists
        if(!File::isDirectory($targetDir)){
            File::makeDirectory($targetDir, 0755, true);
        }

        if (! File::exists($targetPath)) {
            File::copy($logoPath, $targetPath);
            $this->info('✅ ' . $targetPath. ' copiada correctamente! ');
        } else {
            $this->warn('⚠️ ' . $targetPath. ' ya existe, se omitió la copia.');
        }
    }
}
