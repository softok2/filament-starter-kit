<?php

namespace Softok2\FilamentStarterKit\Commands\Handlers;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class PrettierHandler extends Command
{
    /**
     * https://gist.github.com/marcorieser/38701a975049891d19f5507679d0967e
     */
    public function handle(): void
    {
        $this->info('Installing Prettier...');
        exec('npm install -D prettier prettier-plugin-organize-imports prettier-plugin-blade prettier-plugin-tailwindcss');
        $this->info('✅ Prettier has been installed successfully.');

        try {
            $this->copyConfig();
            $this->copyIgnore();
        } catch (FileNotFoundException $e) {
            $this->error('❌ Error  copying Prettier configuration files: '.$e->getMessage());
        }
    }

    /**
     * @throws FileNotFoundException
     */
    private function copyIgnore(): void
    {
        $this->copy(
            stubName: '.prettierignore',
            source: dirname(__DIR__, 3).'/stubs/.prettierignore.stub',
            destination: base_path('.prettierignore')
        );
    }

    /**
     * @throws FileNotFoundException
     */
    private function copyConfig(): void
    {
        $this->copy(
            stubName: '.prettierrc',
            source: dirname(__DIR__, 3).'/stubs/.prettierrc.stub',
            destination: base_path('.prettierrc')
        );
    }

    /**
     * @throws FileNotFoundException
     */
    private function copy(string $stubName, string $source, string $destination): void
    {

        if (! File::exists($destination)) {
            $stubContent = File::get($source);

            File::put($destination, $stubContent);

            $this->info('✅ '.$stubName.' created from stub!');
        } else {
            $this->warn('⚠️ '.$stubName.' already exists, skipping creation.');
        }

    }
}
