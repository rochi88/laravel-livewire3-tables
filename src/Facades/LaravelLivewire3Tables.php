<?php

namespace Rochi88\LaravelLivewire3Tables\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rochi88\LaravelLivewire3Tables\LaravelLivewire3Tables
 */
class LaravelLivewire3Tables extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Rochi88\LaravelLivewire3Tables\TableComponent::class;
    }
}
