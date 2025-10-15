<?php

namespace Softok2\FilamentStarterKit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Softok2\FilamentStarterKit\FilamentStarterKit
 */
class FilamentStarterKit extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Softok2\FilamentStarterKit\FilamentStarterKit::class;
    }
}
