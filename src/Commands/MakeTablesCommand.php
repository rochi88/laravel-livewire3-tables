<?php

namespace Rochi88\LaravelLivewire3Tables\Commands;

use Illuminate\Console\Command;

class MakeTablesCommand extends Command
{
    public $signature = 'laravel-livewire3-tables';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
