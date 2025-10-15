<?php

namespace Softok2\FilamentStarterKit\Commands;

use Illuminate\Console\Command;
use Softok2\FilamentStarterKit\Commands\Handlers\ApexChartsHandler;
use Softok2\FilamentStarterKit\Commands\Handlers\AuthUiEnhancerHandler;
use Softok2\FilamentStarterKit\Commands\Handlers\DebugBarHandler;
use Softok2\FilamentStarterKit\Commands\Handlers\FilamentHandler;
use Softok2\FilamentStarterKit\Commands\Handlers\LucideIconsHandler;
use Softok2\FilamentStarterKit\Commands\Handlers\MigrationsHandler;
use Softok2\FilamentStarterKit\Commands\Handlers\PintHandler;
use Softok2\FilamentStarterKit\Commands\Handlers\PrettierHandler;
use Softok2\FilamentStarterKit\Commands\Handlers\SpatieMediaLibraryHandler;
use Softok2\FilamentStarterKit\Commands\Handlers\TelescopeHandler;

class FilamentStarterKitCommand extends Command
{
    public $signature = 'filament-starter-kit:install';

    public $description = 'Setup the Filament Starter Kit';

    protected array $handlers = [
        FilamentHandler::class,
        ApexChartsHandler::class,
        AuthUiEnhancerHandler::class,
        LucideIconsHandler::class,
        SpatieMediaLibraryHandler::class,
        TelescopeHandler::class,
        DebugBarHandler::class,
        MigrationsHandler::class,
        PintHandler::class,
        PrettierHandler::class,
    ];

    public function handle(): int
    {

        $this->output->info('Starting Filament Starter Kit installation...');

        foreach ($this->handlers as $handler) {
            $this->call($handler);
            $this->newLine();
        }

        $this->output->success('🎉🚀 Filament Starter Kit installed successfully! 😄');

        return self::SUCCESS;
    }
}
