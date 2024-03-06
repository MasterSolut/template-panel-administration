<?php

namespace Paneladministration\PanelAdministration\Commands;

use Illuminate\Console\Command;

class PanelAdministrationCommand extends Command
{
    public $signature = 'panel-administration';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
